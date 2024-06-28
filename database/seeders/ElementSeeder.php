<?php

namespace Database\Seeders;

use App\Models\Element;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ElementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $elements = [
            ['name' => 'Hydrogen', 'symbol' => 'H', 'atomic_number' => 1, 'description' => 'Hydrogen is the first element on the periodic table. It is the most abundant chemical substance in the universe.', 'image_url' => ''],
            ['name' => 'Helium', 'symbol' => 'He', 'atomic_number' => 2, 'description' => 'Helium is a colorless, odorless, tasteless, non-toxic, inert, monatomic gas that heads the noble gas group in the periodic table.', 'image_url' => ''],
            ['name' => 'Lithium', 'symbol' => 'Li', 'atomic_number' => 3, 'description' => 'Lithium is a soft, silvery-white alkali metal. Under standard conditions, it is the lightest metal and the lightest solid element.', 'image_url' => ''],
            ['name' => 'Beryllium', 'symbol' => 'Be', 'atomic_number' => 4, 'description' => 'Beryllium is a divalent element which occurs naturally only in combination with other elements in minerals.', 'image_url' => ''],
            ['name' => 'Boron', 'symbol' => 'B', 'atomic_number' => 5, 'description' => 'Boron is a metalloid element which is essential for the growth of plants and is used in various industrial applications.', 'image_url' => ''],
            ['name' => 'Carbon', 'symbol' => 'C', 'atomic_number' => 6, 'description' => 'Carbon is a chemical element with symbol C and atomic number 6. It is nonmetallic and tetravalent—making four electrons available to form covalent chemical bonds.', 'image_url' => ''],
            ['name' => 'Nitrogen', 'symbol' => 'N', 'atomic_number' => 7, 'description' => 'Nitrogen is a chemical element with symbol N and atomic number 7. It is a common element in the universe, estimated at about seventh in total abundance in the Milky Way and the Solar System.', 'image_url' => ''],
            ['name' => 'Oxygen', 'symbol' => 'O', 'atomic_number' => 8, 'description' => 'Oxygen is a chemical element with symbol O and atomic number 8. It is a member of the chalcogen group on the periodic table and is a highly reactive nonmetal and oxidizing agent that readily forms oxides with most elements as well as with other compounds.', 'image_url' => ''],
            ['name' => 'Fluorine', 'symbol' => 'F', 'atomic_number' => 9, 'description' => 'Fluorine is a chemical element with symbol F and atomic number 9. It is the lightest halogen and exists as a highly toxic pale yellow diatomic gas at standard conditions.', 'image_url' => ''],
            ['name' => 'Neon', 'symbol' => 'Ne', 'atomic_number' => 10, 'description' => 'Neon is a chemical element with symbol Ne and atomic number 10. It is a noble gas. Neon is a colorless, odorless, inert monatomic gas under standard conditions, with about two-thirds the density of air.', 'image_url' => ''],
            ['name' => 'Sodium', 'symbol' => 'Na', 'atomic_number' => 11, 'description' => 'Sodium is a chemical element with symbol Na and atomic number 11. It is a soft, silvery-white, highly reactive metal.', 'image_url' => ''],
            ['name' => 'Magnesium', 'symbol' => 'Mg', 'atomic_number' => 12, 'description' => 'Magnesium is a chemical element with symbol Mg and atomic number 12. It is a shiny gray solid which bears a close physical resemblance to the other five elements in the second column (group 2, or alkaline earth metals) of the periodic table.', 'image_url' => ''],
            ['name' => 'Aluminum', 'symbol' => 'Al', 'atomic_number' => 13, 'description' => 'Aluminum is a chemical element with symbol Al and atomic number 13. It is a silvery-white, soft, nonmagnetic and ductile metal in the boron group.', 'image_url' => ''],
            ['name' => 'Silicon', 'symbol' => 'Si', 'atomic_number' => 14, 'description' => 'Silicon is a chemical element with symbol Si and atomic number 14. It is a hard, brittle crystalline solid with a blue-gray metallic luster, and is a tetravalent metalloid and semiconductor.', 'image_url' => ''],
            ['name' => 'Phosphorus', 'symbol' => 'P', 'atomic_number' => 15, 'description' => 'Phosphorus is a chemical element with symbol P and atomic number 15. It is a nonmetal of the nitrogen group. It exists in two major forms, white phosphorus and red phosphorus, but because it is highly reactive, phosphorus is never found as a free element on Earth.', 'image_url' => ''],
            ['name' => 'Sulfur', 'symbol' => 'S', 'atomic_number' => 16, 'description' => 'Sulfur is a chemical element with symbol S and atomic number 16. It is abundant, multivalent, and nonmetallic. Under normal conditions, sulfur atoms form cyclic octatomic molecules with a chemical formula S8.', 'image_url' => ''],
            ['name' => 'Chlorine', 'symbol' => 'Cl', 'atomic_number' => 17, 'description' => 'Chlorine is a chemical element with symbol Cl and atomic number 17. It is the second lightest of the halogens and appears between fluorine and bromine in the periodic table and its properties are mostly intermediate between them.', 'image_url' => ''],
            ['name' => 'Argon', 'symbol' => 'Ar', 'atomic_number' => 18, 'description' => 'Argon is a chemical element with symbol Ar and atomic number 18. It is in group 18 of the periodic table and is a noble gas.', 'image_url' => ''],
            ['name' => 'Potassium', 'symbol' => 'K', 'atomic_number' => 19, 'description' => 'Potassium is a chemical element with symbol K and atomic number 19. It was first isolated from potash, the ashes of plants, from which its name derives.', 'image_url' => ''],
            ['name' => 'Calcium', 'symbol' => 'Ca', 'atomic_number' => 20, 'description' => 'Calcium is a chemical element with symbol Ca and atomic number 20. As an alkaline earth metal, calcium is a reactive metal that forms a dark oxide-nitride layer when exposed to air.', 'image_url' => ''],
            ['name' => 'Scandium', 'symbol' => 'Sc', 'atomic_number' => 21, 'description' => 'Scandium is a chemical element with symbol Sc and atomic number 21. A silvery-white metallic d-block element, it has historically been classified as a rare-earth element, together with yttrium and the lanthanides.', 'image_url' => ''],
            ['name' => 'Titanium', 'symbol' => 'Ti', 'atomic_number' => 22, 'description' => 'Titanium is a chemical element with symbol Ti and atomic number 22. It is a lustrous transition metal with a silver color, low density, and high strength. Titanium is resistant to corrosion in sea water, aqua regia, and chlorine.', 'image_url' => ''],
            ['name' => 'Vanadium', 'symbol' => 'V', 'atomic_number' => 23, 'description' => 'Vanadium is a chemical element with symbol V and atomic number 23. It is a hard, silvery-grey, malleable transition metal. The elemental metal is rarely found in nature, but once isolated artificially, the formation of an oxide layer (passivation) somewhat stabilizes the free metal against further oxidation.', 'image_url' => ''],
            ['name' => 'Chromium', 'symbol' => 'Cr', 'atomic_number' => 24, 'description' => 'Chromium is a chemical element with symbol Cr and atomic number 24. It is the first element in group 6. It is a steely-grey, lustrous, hard and brittle transition metal.', 'image_url' => ''],
            ['name' => 'Manganese', 'symbol' => 'Mn', 'atomic_number' => 25, 'description' => 'Manganese is a chemical element with symbol Mn and atomic number 25. It is not found as a free element in nature; it is often found in minerals in combination with iron. Manganese is a transition metal with a multifaceted array of industrial alloy uses, particularly in stainless steels.', 'image_url' => ''],
            ['name' => 'Iron', 'symbol' => 'Fe', 'atomic_number' => 26, 'description' => 'Iron is a chemical element with symbol Fe and atomic number 26. It is a metal that belongs to the first transition series and group 8 of the periodic table. It is by mass the most common element on Earth, forming much of Earth\'s outer and inner core.', 'image_url' => ''],
            ['name' => 'Cobalt', 'symbol' => 'Co', 'atomic_number' => 27, 'description' => 'Cobalt is a chemical element with symbol Co and atomic number 27. Like nickel, cobalt is found in the Earth\'s crust only in a chemically combined form, save for small deposits found in alloys of natural meteoric iron.', 'image_url' => ''],
            ['name' => 'Nickel', 'symbol' => 'Ni', 'atomic_number' => 28, 'description' => 'Nickel is a chemical element with symbol Ni and atomic number 28. It is a silvery-white lustrous metal with a slight golden tinge. Nickel belongs to the transition metals and is hard and ductile.', 'image_url' => ''],
            ['name' => 'Copper', 'symbol' => 'Cu', 'atomic_number' => 29, 'description' => 'Copper is a chemical element with symbol Cu and atomic number 29. It is a soft, malleable, and ductile metal with very high thermal and electrical conductivity.', 'image_url' => ''],
            ['name' => 'Zinc', 'symbol' => 'Zn', 'atomic_number' => 30, 'description' => 'Zinc is a chemical element with symbol Zn and atomic number 30. It is the first element in group 12 of the periodic table'],
            ['name' => 'Gallium', 'symbol' => 'Ga', 'atomic_number' => 31, 'description' => 'Gallium is a chemical element with symbol Ga and atomic number 31. It is a soft, silvery metal at standard temperature and pressure.'],
            ['name' => 'Germanium', 'symbol' => 'Ge', 'atomic_number' => 32, 'description' => 'Germanium is a chemical element with symbol Ge and atomic number 32. It is a lustrous, hard, grayish-white metalloid in the carbon group.'],
            ['name' => 'Arsenic', 'symbol' => 'As', 'atomic_number' => 33, 'description' => 'Arsenic is a chemical element with symbol As and atomic number 33. It occurs in many minerals, usually in combination with sulfur and metals.'],
            ['name' => 'Selenium', 'symbol' => 'Se', 'atomic_number' => 34, 'description' => 'Selenium is a chemical element with symbol Se and atomic number 34. It is a nonmetal with properties that are intermediate between the elements above and below in the periodic table.'],
            ['name' => 'Bromine', 'symbol' => 'Br', 'atomic_number' => 35, 'description' => 'Bromine is a chemical element with symbol Br and atomic number 35. It is a fuming red-brown liquid at room temperature, that evaporates readily to form a similarly colored gas.'],
            ['name' => 'Krypton', 'symbol' => 'Kr', 'atomic_number' => 36, 'description' => 'Krypton is a chemical element with symbol Kr and atomic number 36. It is a colorless, odorless, tasteless noble gas that occurs in trace amounts in the atmosphere.'],
            ['name' => 'Rubidium', 'symbol' => 'Rb', 'atomic_number' => 37, 'description' => 'Rubidium is a chemical element with symbol Rb and atomic number 37. It is a soft, silvery-white metallic element of the alkali metal group.'],
            ['name' => 'Strontium', 'symbol' => 'Sr', 'atomic_number' => 38, 'description' => 'Strontium is a chemical element with symbol Sr and atomic number 38. An alkaline earth metal, strontium is a soft silver-white yellowish metallic element.'],
            ['name' => 'Yttrium', 'symbol' => 'Y', 'atomic_number' => 39, 'description' => 'Yttrium is a chemical element with symbol Y and atomic number 39. It is a silvery-metallic transition metal chemically similar to the lanthanides.'],
            ['name' => 'Zirconium', 'symbol' => 'Zr', 'atomic_number' => 40, 'description' => 'Zirconium is a chemical element with symbol Zr and atomic number 40. The name zirconium is taken from the name of the mineral zircon, the most important source of zirconium.'],
            ['name' => 'Niobium', 'symbol' => 'Nb', 'atomic_number' => 41, 'description' => 'Niobium is a chemical element with symbol Nb and atomic number 41. It is a soft, grey, ductile transition metal often found in the minerals pyrochlore and columbite.'],
            ['name' => 'Molybdenum', 'symbol' => 'Mo', 'atomic_number' => 42, 'description' => 'Molybdenum is a chemical element with symbol Mo and atomic number 42. It is a silvery metal with a gray cast, and has the sixth-highest melting point of any element.'],
            ['name' => 'Technetium', 'symbol' => 'Tc', 'atomic_number' => 43, 'description' => 'Technetium is a chemical element with symbol Tc and atomic number 43. It is the lightest element whose isotopes are all radioactive; none are stable.'],
            ['name' => 'Ruthenium', 'symbol' => 'Ru', 'atomic_number' => 44, 'description' => 'Ruthenium is a chemical element with symbol Ru and atomic number 44. It is a rare transition metal belonging to the platinum group of the periodic table.'],
            ['name' => 'Rhodium', 'symbol' => 'Rh', 'atomic_number' => 45, 'description' => 'Rhodium is a chemical element with symbol Rh and atomic number 45. It is a rare, silvery-white, hard, corrosion-resistant, and chemically inert transition metal.'],
            ['name' => 'Palladium', 'symbol' => 'Pd', 'atomic_number' => 46, 'description' => 'Palladium is a chemical element with symbol Pd and atomic number 46. It is a rare and lustrous silvery-white metal discovered in 1803.'],
            ['name' => 'Silver', 'symbol' => 'Ag', 'atomic_number' => 47, 'description' => 'Silver is a chemical element with symbol Ag and atomic number 47. It is a soft, white, lustrous transition metal, exhibiting the highest electrical conductivity of any element.'],
            ['name' => 'Cadmium', 'symbol' => 'Cd', 'atomic_number' => 48, 'description' => 'Cadmium is a chemical element with symbol Cd and atomic number 48. This soft, bluish-white metal is chemically similar to the two other stable metals in group 12, zinc and mercury.'],
            ['name' => 'Indium', 'symbol' => 'In', 'atomic_number' => 49, 'description' => 'Indium is a chemical element with symbol In and atomic number 49. It is a post-transition metal that makes up 0.21 parts per million of the Earth\'s crust.'],
            ['name' => 'Tin', 'symbol' => 'Sn', 'atomic_number' => 50, 'description' => 'Tin is a chemical element with symbol Sn and atomic number 50. It is a post-transition metal known for its use in tin cans and tin foil.']
        ];
        foreach ($elements as $element) {
            Element::create($element);
        }

    }
}
