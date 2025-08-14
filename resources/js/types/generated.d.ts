declare namespace App.Data {
export type DietPlanData = {
id: number | null;
name: string;
description: string;
price: number;
plan: string;
duration: number;
created_at: string | null;
updated_at: string | null;
};
export type RoleData = {
id: number | null;
name: string;
};
export type TrainerData = {
id: number | null;
name: string;
email: string;
user_id: number;
phone: string | null;
bio: string | null;
specialization: string | null;
created_at: string | null;
updated_at: string | null;
};
export type TrainerRequestData = {
name: string;
email: string;
phone: string;
bio: string;
specialization: string;
};
export type WorkoutClassData = {
id: number | null;
name: string;
description: string;
class_fee: number;
duration: number;
intensity: number;
complexity: number;
image: any;
created_at: string | null;
updated_at: string | null;
};
}
