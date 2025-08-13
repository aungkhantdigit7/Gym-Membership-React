import AppSidebarLayout from "@/layouts/app/app-sidebar-layout";
import { Pagination } from "@/types";
import { Button, Group, Title } from "@mantine/core";
import { DataTable } from "mantine-datatable";

interface Props {
    trainers: Pagination<App.Data.TrainerData>;
}

export default function List({ trainers }: Props) {

    return (
        <AppSidebarLayout>
            <Group justify="space-between">
                <Title order={2}>Trainers</Title>
                <Button>Add Trainer</Button>
            </Group>
            {/* <pre>{JSON.stringify(trainers, null, 2)}</pre> */}
            <DataTable withTableBorder records={trainers.data}
                 columns={[
                    { accessor: 'id', title: 'ID' },
                    { accessor: 'name', title: 'Name' },
                    { accessor: 'email', title: 'Email' },
                    { accessor: 'phone', title: 'Phone' },
                    { accessor: 'specialization', title: 'Specialization' },
                    { accessor: 'created_at', title: 'Created At' },
                 ]}
                
            />
            {/* <DataTable  /> */}
        </AppSidebarLayout>
    );
}