import AppSidebarLayout from '@/layouts/app/app-sidebar-layout';
import { useForm } from '@inertiajs/react';
import { Card, TextInput, Textarea, NumberInput, Button, Stack, FileInput, Rating, Text, Group } from '@mantine/core';
import { FormEventHandler } from 'react';

interface Props {
    workoutClass?: App.Data.WorkoutClassData;
}

export default function Form({ workoutClass }: Props) {
    const form = useForm<App.Data.WorkoutClassData>(workoutClass || {
        id: null,
        name: '',
        description: '',
        class_fee: 0,
        duration: 0,
        intensity: 1,
        complexity: 1,
        image: null,
        created_at: null,
        updated_at: null
    });

    const handleSubmit : FormEventHandler = (e) => {
        e.preventDefault();
        form.post(route('admin.workout-classes.store'), {
            onSuccess: () => form.reset(),
        });
    };

    return (
        <AppSidebarLayout>
            <Card component='form' onSubmit={handleSubmit} withBorder>
                <Stack>
                    <TextInput
                        label="Name"
                        value={form.data.name || ''}
                        onChange={(e) => form.setData('name', e.target.value)}
                        error={form.errors.name}
                    />
                    <Textarea
                        label="Description"
                        value={form.data.description || ''}
                        onChange={(e) => form.setData('description', e.target.value)}
                        error={form.errors.description}
                    />
                    <NumberInput
                        label="Class Fee"
                        value={form.data.class_fee || 0}
                        onChange={(value) => form.setData('class_fee', typeof value === 'number' ? value : 0)}
                        error={form.errors.class_fee}
                        min={0}
                        step={0.01}
                    />
                    <NumberInput
                        label="Duration (minutes)"
                        value={form.data.duration || 0}
                        onChange={(value) => form.setData('duration', typeof value === 'number' ? value : 0)}
                        error={form.errors.duration}
                        min={1}
                    />
                    {/* <NumberInput
                        label="Intensity (1-10)"
                        value={form.data.intensity || 1}
                        onChange={(value) => form.setData('intensity', typeof value === 'number' ? value : 1)}
                        error={form.errors.intensity}
                        min={1}
                        max={10}
                    /> */}
                    <Group >
                        <Text>Intensity</Text>
                        <Rating

                            value={form.data.intensity || 1}
                            onChange={(value) => form.setData('intensity', value)}
                        // error={form.errors.intensity}
                        />
                    </Group>
                    <Group>
                        <Text>Complexity</Text>
                        <Rating
                            value={form.data.complexity || 1}
                            onChange={(value) => form.setData('complexity', value)}
                        />
                    </Group>

                    
                    <FileInput
                        label="Image"
                        onChange={(file) => form.setData('image', file)}
                        error={form.errors.image}
                        accept="image/*"
                    />
                    <Button
                        type="submit"
                        loading={form.processing}
                    >
                        Save Workout Class
                    </Button>
                </Stack>
            </Card>
        </AppSidebarLayout>
    );
}
