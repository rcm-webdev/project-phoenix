<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $ophthalmicItems = [
            'Eye Drops (PF Artificial Tears)',
            'Tropicamide 1% Solution',
            'Proparacaine Eye Drops',
            'Ophthalmic Sponges',
            'Sterile Cotton Swabs',
            'Contact Lens Solution',
            'Slit Lamp Bulb',
            'Surgical Blade No. 15',
            'Tonometer Tip Cover',
            'Ophthalmoscope Battery',
            'Fluorescein Strips',
            'Irrigation Syringe 10ml',
            'Lens Cleaning Wipes',
            'Drapes (Sterile Eye Surgery)',
            'Sterile Gloves',
            'Face Mask (Surgical)',
            'Eye Patch (Post-Op)',
            'Speculum (Eyelid Retractor)',
            'Microscope Cover Sheet',
            'Intraocular Lens (IOL)'
        ];

        $categories = [
            'Consumables',
            'Medications',
            'Equipment',
            'Surgical Supply'
        ];

        $units = [
            'bottle',
            'box',
            'pack',
            'piece',
            'set',
            'unit'
        ];
        return [
            'name' => $this->faker->randomElement($ophthalmicItems),
            'sku' => strtoupper($this->faker->bothify('OPH-###??')), // e.g., OPH-142AB
            'category' => $this->faker->randomElement($categories),
            'unit' => $this->faker->randomElement($units),
            'reorder_level' => $this->faker->numberBetween(5, 20),
            'description' => $this->faker->sentence(8),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
