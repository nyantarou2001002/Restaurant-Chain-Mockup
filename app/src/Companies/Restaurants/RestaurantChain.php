<?php

require_once __DIR__ . '/../../FileConverter/FileConvertible.php';
require_once __DIR__ . '/../Company.php';

class RestaurantChain extends Company implements FileConvertible
{

    private int $chainId;
    /** @var RestaurantLocation[] */
    private array $restaurantLocations = [];
    private string $cuisineType;
    private int $numberOfLocations;
    private string $parentCompany;

    public function __construct(
        $name,
        $foundingYear,
        $description,
        $website,
        $phone,
        $industry,
        $ceo,
        $isPubliclyTraded,
        $country,
        $founder,
        $totalEmployees,
        $chainId,
        $restaurantLocations,
        $cuisineType,
        $numberOfLocations,
        $parentCompany,
    ) {
        parent::__construct($name, $foundingYear, $description, $website, $phone, $industry, $ceo, $isPubliclyTraded, $country, $founder, $totalEmployees,);
        $this->chainId = $chainId;
        $this->restaurantLocations = $restaurantLocations;
        $this->cuisineType = $cuisineType;
        $this->numberOfLocations = $numberOfLocations;
        $this->parentCompany = $parentCompany;
    }

    public function toString(): string
    {
        return "";
    }
    public function toHTML(): string
    {
        return "";
    }
    public function toMarkdown(): string
    {
        return "";
    }
    public function toArray(): array
    {
        return array();
    }


    /**
     * 紹介用文章を生成
     *
     * @return string
     */
    public function introduction(): string
    {
        $introduction = parent::introduction();

        $introduction .= sprintf("Chain ID: {$this->getChainId()}, ");
        $introduction .= sprintf("Locations: {$this->printRestaurantLocations()}, ");
        $introduction .= sprintf("Cuisine type: {$this->getCuisineType()}, ");
        $introduction .= sprintf("Number of Location: {$this->getNumberOfLocations()}, ");
        $introduction .= sprintf("Parent company: {$this->getParentCompany()}");
        $introduction .= sprintf("\n");

        return $introduction;
    }

    /**
     * restaurantLocationを全て文章化する
     *
     * @return string
     */
    public function printRestaurantLocations(): string
    {
        $locations = "";
        foreach ($this->getRestaurantLocations() as $location) {
            $locations .= $location->introduction();
        }
        return $locations;
    }

    /**
     * RestaurantLocationを追加する
     *
     * @param RestaurantLocation $location
     * @return void
     */
    public function addLocation(RestaurantLocation $location): void
    {
        array_push($this->restaurantLocations, $location);
    }


    /**
     * Get the value of chainId
     *
     * @return int
     */
    public function getChainId(): int
    {
        return $this->chainId;
    }

    /**
     * Set the value of chainId
     *
     * @param int $chainId
     *
     * @return self
     */
    public function setChainId(int $chainId): self
    {
        $this->chainId = $chainId;

        return $this;
    }

    /**
     * Get the value of restaurantLocations
     *
     * @return array
     */
    public function getRestaurantLocations(): array
    {
        return $this->restaurantLocations;
    }

    /**
     * Set the value of restaurantLocations
     *
     * @param array $restaurantLocations
     *
     * @return self
     */
    public function setRestaurantLocations(array $restaurantLocations): self
    {
        $this->restaurantLocations = $restaurantLocations;

        return $this;
    }

    /**
     * Get the value of cuisineType
     *
     * @return string
     */
    public function getCuisineType(): string
    {
        return $this->cuisineType;
    }

    /**
     * Set the value of cuisineType
     *
     * @param string $cuisineType
     *
     * @return self
     */
    public function setCuisineType(string $cuisineType): self
    {
        $this->cuisineType = $cuisineType;

        return $this;
    }

    /**
     * Get the value of numberOfLocations
     *
     * @return int
     */
    public function getNumberOfLocations(): int
    {
        return $this->numberOfLocations;
    }

    /**
     * Set the value of numberOfLocations
     *
     * @param int $numberOfLocations
     *
     * @return self
     */
    public function setNumberOfLocations(int $numberOfLocations): self
    {
        $this->numberOfLocations = $numberOfLocations;

        return $this;
    }

    /**
     * Get the value of parentCompany
     *
     * @return string
     */
    public function getParentCompany(): string
    {
        return $this->parentCompany;
    }

    /**
     * Set the value of parentCompany
     *
     * @param string $parentCompany
     *
     * @return self
     */
    public function setParentCompany(string $parentCompany): self
    {
        $this->parentCompany = $parentCompany;

        return $this;
    }
}
