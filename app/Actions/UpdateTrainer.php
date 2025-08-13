<?php

namespace App\Actions;

use App\Data\TrainerData;
use App\Models\Trainer;
use Illuminate\Console\Command;
use Lorisleiva\Actions\Concerns\AsAction;


class UpdateTrainer
{
    use AsAction;
    public string $commandSignature = 'trainer:update';

    public function handle(TrainerData $data, int $id)
    {
        // ...
        Trainer::find($id)->update([
            'name' => $data->name,
            'email' => $data->email,
            'phone' => $data->phone,
            'bio' => $data->bio,
            'specialization' => $data->specialization,
        ]);
        return Trainer::find($data->id);
    }

    public function asController(int $id, TrainerData $data)
    {
        return $this->handle($data, $id);
    }

    public function asCommand(Command $command): void
    {
        // Logic to handle command input for updating a trainer
        $trainerId = $command->ask('Enter trainer ID to update:');
        $name = $command->ask('Enter trainer name:');
        $email = $command->ask('Enter trainer email:');
        $specialization = $command->ask('Enter trainer specialization:');

        $data = TrainerData::from([
            // 'id' => $trainerId,
            'name' => $name,
            'email' => $email,
            'user_id' => 1, // Assuming a default user ID for simplicity
            'specialization' => $specialization,
        ]);


        $this->handle($data, $trainerId);
    }
}
