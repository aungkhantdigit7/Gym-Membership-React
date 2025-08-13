<?php

namespace App\Actions;

use App\Data\TrainerData;
use App\Models\Trainer;
use App\Models\User;
use Lorisleiva\Actions\Concerns\AsAction;
use function Laravel\Prompts\textarea;
use function Laravel\Prompts\text;
use Illuminate\Console\Command;



class DestoryTrainer
{
    use AsAction;
    public string $commandSignature = 'trainer:destroy';

    public function handle(int $trainerId)
    {
        // Logic to destroy a trainer by ID
        $trainer = Trainer::findOrFail($trainerId);
        $trainerData = TrainerData::from($trainer);
        $user = User::query()->where('email', $trainerData->email)->first();
        DestoryUser::make()->withEmail()->handle($user->email);

        $trainer->delete();
    }
    public function asController(int $trainerId)
    {
        // Handle the request to destroy a trainer
        return $this->handle($trainerId);
    }

    public function htmlResponse()
    {
        return redirect()->route('admin.trainers.lists')->with('success', 'Trainer deleted successfully.');
    }

    public function asCommand(Command $command): void
    {
        $trainerId = text('Enter the Trainer ID to delete:');
        $this->handle((int) $trainerId);
        // return $this;
    }
}
