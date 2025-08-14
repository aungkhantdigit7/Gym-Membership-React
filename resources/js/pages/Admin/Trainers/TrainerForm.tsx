import AppSidebarLayout from "@/layouts/app/app-sidebar-layout";
import { useForm } from "@inertiajs/react";
import { Button, Card, Group, rem, Textarea, TextInput } from "@mantine/core";


interface Props {
    trainer?: App.Data.TrainerRequestData
}
export default function Form({ trainer }: Props) {

    const form = useForm<App.Data.TrainerRequestData>({
        bio: '',
        email: '',
        name: '',
        phone: '',
        specialization: '',
    })

    const handleSubmit = (e: React.FormEvent) => {
        e.preventDefault();
        
        form.post(route('admin.trainer.store'))
    }
    return (
        <AppSidebarLayout>
            <Card onSubmit={handleSubmit} component="form" w={400} withBorder>
                <TextInput
                    label="Name"
                    value={form.data.name || ''}
                    onChange={(e) => form.setData('name', e.target.value)}
                />
                <TextInput
                    label="Email"
                    value={form.data.email || ''}
                    onChange={(e) => form.setData('email', e.target.value)}
                />
                <TextInput
                    label="Phone"
                    value={form.data.phone || ''}
                    onChange={(e) => form.setData('phone', e.target.value)}
                />
                <Textarea label="Specialization"
                    value={form.data.specialization || ''}
                    onChange={(e) => form.setData('specialization', e.target.value)}
                />
                <Textarea
                    label="Bio"
                    value={form.data.bio || ''}
                    onChange={(e) => form.setData('bio', e.target.value)}
                />
                <Group mt={'lg'} justify="end">
                    <Button variant="outline">
                        Cancel
                    </Button>
                    <Button type="submit">
                        Save
                    </Button>
                </Group>
            </Card>
        </AppSidebarLayout>
    )
}