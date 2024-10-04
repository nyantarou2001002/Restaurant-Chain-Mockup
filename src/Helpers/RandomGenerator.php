<?php

// namespace Helpers;

require_once __DIR__ . '/../../src/Users/User.php';
require_once __DIR__ . '/../../src/Users/Employees/Employee.php';
require_once __DIR__ . '/../../src/Companies/Company.php';
require_once __DIR__ . '/../../src/Companies/Restaurants/RestaurantLocation.php';
require_once __DIR__ . '/../../src/Companies/Restaurants/RestaurantChain.php';

require 'vendor/autoload.php';

use Faker\Factory;

$employee = RandomGenerator::employee();
// echo $employee->introduction();

class RandomGenerator
{

    // ---------- restaurant chain -----------------
    public static function restaurantChain(): RestaurantChain
    {
        $faker = Factory::create();
        $DISHES = [
            "Sushi",
            "Pizza",
            "Hamburger",
            "Pasta",
            "Fried Chicken",
            "Ramen",
            "Taco",
            "Steak",
            "Dim Sum",
            "Falafel",
            "Paella",
            "Curry",
            "Pho",
            "Biryani",
            "Fish and Chips",
            "Tofu Stir Fry",
            "Gyros",
            "Peking Duck",
            "Tamales",
            "Tom Yum Soup"
        ];

        // company部分の作成
        $company = self::company();

        return new RestaurantChain(
            $company->getName(),
            $company->getFoundingYear(),
            $company->getDescription(),
            $company->getWebsite(),
            $company->getPhone(),
            $company->getIndustry(),
            $company->getCeo(),
            $company->getIsPubliclyTraded(),
            $company->getCountry(),
            $company->getFounder(),
            $company->getTotalEmployees(),
            rand(1, 65536),
            self::restaurantLocations($company->getTotalEmployees(), $company->getTotalEmployees()),
            $faker->randomElement($DISHES),
            rand(1, 10),
            $faker->company
        );
    }

    public static function restaurantChains(int $min, int $max): array
    {
        $faker = Factory::create();
        $chains = [];

        // 同じ数字だったら、1つだけ生成するように設定
        if ($min == $max) {
            $numOfChains = 1;
            // それ以外は数の範囲で生成するように設定
        } else {
            $numOfChains = $faker->numberBetween($min, $max);
        }

        for ($i = 0; $i < $numOfChains; $i++) {
            $chains[] = self::restaurantChain();
        }

        return $chains;
    }



    // ---------- restaurant location -----------------
    public static function restaurantLocation(): RestaurantLocation
    {
        $faker = Factory::create();

        return new RestaurantLocation(
            $faker->company,
            sprintf("%s %s", $faker->streetName, $faker->secondaryAddress),
            $faker->city,
            $faker->state,
            $faker->postcode,
            self::employees(1, 5),
            $faker->boolean,
            $faker->boolean
        );
    }

    public static function restaurantLocations(int $min, int $max): array
    {
        $faker = Factory::create();
        $locations = [];
        $numOfLocations = $faker->numberBetween($min, $max);

        for ($i = 0; $i < $numOfLocations; $i++) {
            $locations[] = self::restaurantLocation();
        }

        return $locations;
    }

    // ---------- company -----------------
    public static function company(): Company
    {
        $faker = Factory::create();

        $INDUSTRY = [
            "Fast Food Restaurants",
            "Casual Dining Restaurants",
            "Fine Dining Restaurants",
            "Cafes & Coffee Shops",
            "Buffets and All-You-Can-Eat Restaurants",
            "Food Trucks & Mobile Vending",
            "Pizzerias",
            "Ethnic and Specialty Restaurants",
            "Seafood Restaurants",
            "Vegetarian and Vegan Restaurants",
            "Bakeries",
            "Delis and Sandwich Shops",
            "Ice Cream and Frozen Yogurt Shops",
            "Juice Bars and Smoothie Shops",
            "Pubs and Bars",
            "Catering Services",
            "Takeaway and Delivery Services"
        ];

        return new Company(
            $faker->name(),
            rand(1900, 2023),
            $faker->sentence($nbWords = 6, $variableNbWords = true),
            $faker->url,
            $faker->phoneNumber,
            $faker->randomElement($INDUSTRY),
            $faker->name(),
            $faker->boolean,
            $faker->country,
            $faker->name(),
            rand(1, 3)
        );
    }

    public static function companies(int $min, int $max): array
    {
        $faker = Factory::create();
        $companies = [];
        $numOfCompanies = $faker->numberBetween($min, $max);

        for ($i = 0; $i < $numOfCompanies; $i++) {
            $companies[] = self::company();
        }

        return $companies;
    }

    // ---------- employee -----------------

    /**
     * ランダムなEmployeeを生成する
     *
     * @return Employee
     */
    public static function employee(): Employee
    {
        $faker = Factory::create();

        // random jobTitle
        $JOBTITLE = [
            "Restaurant Manager",
            "Executive Chef",
            "Sous Chef",
            "Line Cook",
            "Pastry Chef",
            "Dishwasher",
            "Server",
            "Host/Hostess",
            "Bartender",
            "Busser",
            "Barista",
            "Sommelier",
            "Fast Food Cashier",
            "Drive-Thru Operator",
            "Food Runner",
            "Head Waiter",
            "Kitchen Porter",
            "Prep Cook",
            "Maitre d'Hotel",
            "Baker"
        ];

        // user
        // $user = self::user();

        return new Employee(
            $faker->randomNumber(),
            $faker->firstName(),
            $faker->lastName(),
            $faker->email,
            $faker->password,
            $faker->phoneNumber,
            $faker->address,
            $faker->dateTimeThisCentury,
            $faker->dateTimeBetween('-10 years', '+20 years'),
            $faker->randomElement(['admin', 'user', 'editor']),

            // jobtitle
            // $faker->jobTitle,
            $faker->randomElement($JOBTITLE),
            // salary
            $faker->randomFloat(2, 10, 100),
            // startDate
            $faker->dateTimeBetween('-30 years', 'now'),
            // awards
            self::awards()
        );
    }


    /**
     * employeeのawards生成用メソッド
     * 文字列の配列を返す
     * 受賞歴なしなら"No awarads received"の文字列が入っただけの配列を返す
     *
     * @return array
     */
    private static function awards(): array
    {
        // random awards
        $AWARDS = [
            "Best Innovative Company",
            "Employee's Choice Award",
            "Leader in Sustainability",
            "Top 100 Companies to Work For",
            "Best Customer Service",
            "Product of the Year",
            "Best Design Award",
            "Environmental Leadership",
            "Top Exporter of the Year",
            "Fastest Growing Company",
            "Technology Pioneer Award",
            "Community Involvement Award",
            "Best in Diversity & Inclusion",
            "Corporate Social Responsibility Award",
            "Excellence in Leadership"
        ];

        // faker
        $faker = Factory::create();

        // randomNumber
        $max = rand(1, 5);
        $min = 1;

        $awards = [];

        // もし0なら受賞歴なし
        if ($max == 0) {
            $awards[] = "No awards received";
            return $awards;
        }

        $numOfAwards = $faker->numberBetween($min, $max);
        for ($i = 0; $i < $numOfAwards; $i++) {
            $awards[] = $faker->randomElement($AWARDS);
        }

        return $awards;
    }

    /**
     * ランダムなEmployeeの配列を生成する
     *
     * @param integer $min
     * @param integer $max
     * @return array
     */
    public static function employees(int $min, int $max): array
    {
        $faker = Factory::create();
        $employees = [];
        $numOfEmployees = $faker->numberBetween($min, $max);

        for ($i = 0; $i < $numOfEmployees; $i++) {
            $employees[] = self::employee();
        }

        return $employees;
    }


    // ---------- user ---------------------
    /**
     * ランダムなユーザを生成する
     *
     * @return User
     */
    public static function user(): User
    {
        $faker = Factory::create();

        return new User(
            $faker->randomNumber(),
            $faker->firstName(),
            $faker->lastName(),
            $faker->email,
            $faker->password,
            $faker->phoneNumber,
            $faker->address,
            $faker->dateTimeThisCentury,
            $faker->dateTimeBetween('-10 years', '+20 years'),
            $faker->randomElement(['admin', 'user', 'editor'])
        );
    }

    /**
     * ランダムなユーザーの配列を生成する
     *
     * @param integer $min
     * @param integer $max
     * @return array
     */
    public static function users(int $min, int $max): array
    {
        $faker = Factory::create();
        $users = [];
        $numOfUsers = $faker->numberBetween($min, $max);

        for ($i = 0; $i < $numOfUsers; $i++) {
            $users[] = self::user();
        }

        return $users;
    }
}
