import AppSidebarLayout from "@/layouts/app/app-sidebar-layout";
import { Pagination } from "@/types";
import { Link } from "@inertiajs/react";
import { Button, Group, Text } from "@mantine/core";
import { DataTable } from "mantine-datatable";

interface Props {
    classes: Pagination<App.Data.WorkoutClassData>;
}

export default function List({ classes }: Props) {
    return (
        <AppSidebarLayout>
            <Group justify="space-between" align="center" mb="md">
                <Text>Workout Classes</Text>
                <Button href={route('admin.workout-class.form')} component={Link}>Add Workout Class</Button>
            </Group>
            <DataTable records={classes.data} columns={[
                { accessor: 'name', title: 'Name' },
                { accessor: 'type', title: 'Type' },
                { accessor: 'created_at', title: 'Created At' },
            ]} />

        </AppSidebarLayout>
    )
}
