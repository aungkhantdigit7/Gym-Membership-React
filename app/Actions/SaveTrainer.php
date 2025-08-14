<?php

namespace App\Actions;

use App\Data\TrainerData;
use App\Data\TrainerRequestData;
use App\Data\UserData;
use App\Models\Trainer;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\DB;
use Lorisleiva\Actions\Concerns\AsAction;

class SaveTrainer
{
    use AsAction;

    public function handle(TrainerRequestData $trainerData)
    {
        DB::beginTransaction();
        try {
            // Validate the trainer data
            $newUser = UserData::from([
                'email' => $trainerData->email,
                'name' => $trainerData->name,
                'password' => 'password', // Default password, should be changed later
                'confirmPassword' => 'password',
            ]);
            $user = CreateUser::make()->handle($newUser);
            $newTrainer = TrainerData::from([
                ...$trainerData->toArray(),
                'user_id' => $user->id,
            ]);
            Trainer::create($newTrainer->toArray());

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw new \InvalidArgumentException('Validation failed: ' . $e->getMessage());
        }
    }

    public function asController(TrainerRequestData $trainerData)
    {
        // Handle the request to save a trainer
        return $this->handle($trainerData);
    }

    public static function routes(Router $router)
    {
        $router->middleware(['web', 'auth']) // 'web' applies HandleInertiaRequests
            ->post('admin/trainers/form}', static::class)
            ->name('admin.trainer.store');
    }

    public function htmlResponse()
    {

        return redirect()->route('admin.trainers.list')->with('success', 'Trainer created successfully.');
    }
}
