<?php

require_once __DIR__ . '/../../FileConverter/FileConvertible.php';
require_once __DIR__ . '/../../Users/Employees/Employee.php';

class RestaurantLocation implements FileConvertible{

    // 場所の名前
    private string $name;
    // 住所
    private string $address;
    // 市区町村
    private string $city;
    // 州
    private string $state;
    // 郵便番号
    private string $zipCode;
    /** @var Employee[] */
    private array $employees;
    // 現在開いているか
    private bool $isOpen;
    // ドライブスルー可能か
    private bool $hasDriveThru;

    public function __construct( $name, $address, $city, $state, $zipCode, $employees, $isOpen, $hasDriveThru,)
    {
        $this->name = $name;
        $this->address = $address;
        $this->city = $city;
        $this->state = $state;
        $this->zipCode = $zipCode;
        $this->employees = $employees;
        $this->isOpen = $isOpen;
        $this->hasDriveThru = $hasDriveThru;
    }


    /**
     * 会社の簡単な紹介
     *
     * @return string
     */
    public function shortIntroduction():string {
        return sprintf("Company Name:%s Address: %s ZipCode: %s", $this->getName(), sprintf("%s, %s, %s", $this->getAddress(), $this->getCity(), $this->getState()), $this->getZipCode());
    }

    /**
     * locationについての説明文を生成
     *
     * @return string
     */
    public function introduction():string {
        $introduction = " Address: {$this->getName()}, {$this->getAddress()}, {$this->getCity()}, {$this->getState()},  ZipCode: {$this->getZipCode()}, ";
        $introduction .= " Open?: " ;
        $introduction .= ($this->getIsOpen()) ? "Yes" : "No";
        $introduction .= "\n";
        return $introduction;
    }

    // todo: 

    public function toString():string{
        return "";
    }
    public function toHTML():string{
        return "";
    }
    public function toMarkdown():string{
        return "";
    }
    public function toArray():array{
        return array();
    }


    // getter setter

    /**
     * Get the value of name
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @param string $name
     *
     * @return self
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of address
     *
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * Set the value of address
     *
     * @param string $address
     *
     * @return self
     */
    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get the value of city
     *
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * Set the value of city
     *
     * @param string $city
     *
     * @return self
     */
    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get the value of state
     *
     * @return string
     */
    public function getState(): string
    {
        return $this->state;
    }

    /**
     * Set the value of state
     *
     * @param string $state
     *
     * @return self
     */
    public function setState(string $state): self
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get the value of zipCode
     *
     * @return string
     */
    public function getZipCode(): string
    {
        return $this->zipCode;
    }

    /**
     * Set the value of zipCode
     *
     * @param string $zipCode
     *
     * @return self
     */
    public function setZipCode(string $zipCode): self
    {
        $this->zipCode = $zipCode;

        return $this;
    }

    /**
     * Get the value of employees
     *
     * @return array
     */
    public function getEmployees(): array
    {
        return $this->employees;
    }

    /**
     * Set the value of employees
     *
     * @param array $employees
     *
     * @return self
     */
    public function setEmployees(array $employees): self
    {
        $this->employees = $employees;

        return $this;
    }

    /**
     * Get the value of isOpen
     *
     * @return bool
     */
    public function getIsOpen(): bool
    {
        return $this->isOpen;
    }

    /**
     * Set the value of isOpen
     *
     * @param bool $isOpen
     *
     * @return self
     */
    public function setIsOpen(bool $isOpen): self
    {
        $this->isOpen = $isOpen;

        return $this;
    }

    /**
     * Get the value of hasDriveThru
     *
     * @return bool
     */
    public function getHasDriveThru(): bool
    {
        return $this->hasDriveThru;
    }

    /**
     * Set the value of hasDriveThru
     *
     * @param bool $hasDriveThru
     *
     * @return self
     */
    public function setHasDriveThru(bool $hasDriveThru): self
    {
        $this->hasDriveThru = $hasDriveThru;

        return $this;
    }
}