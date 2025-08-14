import AppSidebarLayout from '@/layouts/app/app-sidebar-layout';
import { useForm } from '@inertiajs/react';
import { Card, TextInput, Textarea, NumberInput, Button, Stack } from '@mantine/core';
import React, { FormEventHandler } from 'react';


interface Props {
    dietPlan?: App.Data.DietPlanData;
}
const DietForm = ({ dietPlan }: Props) => {
    const form = useForm<App.Data.DietPlanData>( {
        id: null,
        name: '',
        description: '',
        price: 0,
        plan: '',
        duration: 0,
        created_at: null,
        updated_at: null
    });
    const handleSubmit: FormEventHandler = (e) => {
        e.preventDefault();
        form.post(route('admin.diet-plans.store'), {
            onFinish: () => form.reset(),
        });
    }

    return (
        <AppSidebarLayout>
            <Card component={'form'} onSubmit={handleSubmit} withBorder>
                <pre>{ JSON.stringify(form.data, null, 3) }</pre>
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
                        label="Price"
                        value={form.data.price || 0}
                        onChange={(value) => form.setData('price', typeof value === 'number' ? value : 0)}
                        error={form.errors.price}
                        min={0}
                        step={0.01}
                    />
                    <Textarea
                        label="Plan"
                        value={form.data.plan || ''}
                        onChange={(e) => form.setData('plan', e.target.value)}
                        error={form.errors.plan}
                    />
                    <NumberInput
                        label="Duration (days)"
                        value={form.data.duration || 0}
                        onChange={(value) => form.setData('duration', typeof value === 'number' ? value : 0)}
                        error={form.errors.duration}
                        min={1}
                    />
                    <Button
                        type="submit"
                        loading={form.processing}
                    >
                        Save Diet Plan
                    </Button>
                </Stack>
            </Card>
        </AppSidebarLayout>
    );
};

export default DietForm;