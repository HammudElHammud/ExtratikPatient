<?php

namespace Database\Seeders;

use App\Models\Alergy;
use App\Models\Condition;
use App\Models\Medication;
use App\Models\NextOfKin;
use App\Models\Patient;
use Illuminate\Database\Seeder;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $patients = json_decode(file_get_contents(resource_path('json/patient.json')), true);
        foreach ($patients as $patient) {
            $create_patient = Patient::query()->create([
                'card_id' => $patient['IdCard'],
                'gender' => $patient['Gender'],
                'name' => $patient['Name'],
                'surname' => $patient['Surname'],
                'date_of_birth' => $patient['DateOfBirth'],
                'address' => $patient['Address'],
                'post_code' => $patient['Postcode'],
                'contact_number_1' => $patient['ContactNumber1'],
                'contact_number_2' => $patient['ContactNumber2'],
            ]);

            foreach ($patient['NextOfKin'] as $kin) {
                $Create_next_of_kin = NextOfKin::query()->create([
                    'patient_id' => $create_patient->id,
                    'card_id' => $kin['IdCard'],
                    'name' => $kin['Name'],
                    'surname' => $kin['Surname'],
                    'contact_number_1' => $kin['ContactNumber1'],
                    'contact_number_2' => $kin['ContactNumber2'],
                ]);
            }
            foreach ($patient['Medical']['Conditions'] as $condition) {
                $create_condition = Condition::query()->create([
                    'patient_id' => $create_patient->id,
                    'name' => $condition['Name'],
                    'notes' => $condition['Notes'],
                ]);
            }
            foreach ($patient['Medical']['Alergies'] as $alergy) {
                $create_alergy = Alergy::query()->create([
                    'patient_id' => $create_patient->id,
                    'name' => $alergy['Name'],
                    'notes' => $alergy['Notes'],
                ]);
            }
            foreach ($patient['Medical']['Medication'] as $medication) {
                $create_medication = Medication::query()->create([
                    'patient_id' => $create_patient->id,
                    'name' => $medication['Name'],
                    'notes' => $medication['Notes'],
                    'start_date' => $medication['StartDate'],
                    'end_date' => $medication['EndDate'],
                ]);
            }
        }
    }
}
