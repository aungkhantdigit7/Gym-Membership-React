<?php

namespace App\Actions;

use App\Data\TrainerData;
use App\Data\UserData;
use App\Models\Trainer;
use Illuminate\Support\Facades\DB;
use Lorisleiva\Actions\Concerns\AsAction;

class SaveTrainer
{
    use AsAction;

    public function handle(TrainerData $trainerData)
    {
        DB::beginTransaction();
        try {
            // Validate the trainer data
            $trainer = Trainer::create($trainerData->toArray());
            $newUser = UserData::from([
                'email' => $trainerData->email,
                'name' => $trainerData->name,
                'password' => 'password', // Default password, should be changed later
                'confirmPassword' => 'password',
            ]);
            CreateUser::make()->handle($newUser);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw new \InvalidArgumentException('Validation failed: ' . $e->getMessage());
        }
    }

    public function asController(TrainerData $trainerData)
    {
        // Handle the request to save a trainer
        return $this->handle($trainerData);
    }

    public function htmlResponse()
    {
        
        return redirect()->route('admin.trainers.lists')->with('success', 'Trainer created successfully.');
    }
}
