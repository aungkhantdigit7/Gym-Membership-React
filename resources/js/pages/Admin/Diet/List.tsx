import AppSidebarLayout from "@/layouts/app/app-sidebar-layout";
import { Pagination } from "@/types";
import { Link } from "@inertiajs/react";
import { Button, Group } from "@mantine/core";
import { DataTable } from "mantine-datatable";

interface Props {
    dietPlans: Pagination<App.Data.DietPlanData>
}

export default function List({ dietPlans }: Props) {
    return (
        <AppSidebarLayout >
            <Group justify="space-between" align="center" mb="md">
                <h1>Diet List</h1>
                <Button component={Link} href={route('admin.diet-plans.form')}>Add Diet Plan</Button>
            </Group>
            <DataTable
                records={dietPlans.data}
                columns={[
                    { accessor: 'name', title: 'Name' },
                    { accessor: 'description', title: 'Description' },
                    { accessor: 'price', title: 'Price' },
                    { accessor: 'plan', title: 'Plan' },
                    { accessor: 'duration', title: 'Duration' },
                ]}
            />
        </AppSidebarLayout>
    )
}
