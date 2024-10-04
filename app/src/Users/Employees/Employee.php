<?php

require_once __DIR__ . '/../User.php';
require_once __DIR__ . '/../../FileConverter/FileConvertible.php';

class Employee extends User implements FileConvertible{

    private string $jobTitle;
    private float $salary;
    private DateTime $startDate;
    /** @var string[] */
    private array $awards;

    public function __construct(
        $id,
        $firstName,
        $lastName,
        $email,
        $hashedPassword,
        $phoneNumber,
        $address,
        $birthDate,
        $membershipExpirationDate,
        $role,
        $jobTitle,
        $salary,
        $startDate,
        $awards
    ){
        parent::__construct( $id, $firstName, $lastName, $email, $hashedPassword, $phoneNumber, $address, $birthDate, $membershipExpirationDate, $role);
        $this->jobTitle = $jobTitle;
        $this->salary = $salary;
        $this->startDate = $startDate;
        $this->awards = $awards;
    } 

    // todo: まだ
    public function toString():string{
        return "";
    }
    // todo: まだ
    public function toHTML():string{
        return "";
    }
    // todo: まだ
    public function toMarkdown():string{
        return "";
    }
    // todo: まだ
    public function toArray():array{
        return array();
    }

    /**
     * 自己紹介用の文を生成する
     *
     * @return string
     */
    public function introduction() : string{
        // $employeeString = parent::introduction();
        $employeeString = sprintf("ID:%d, jobTitle: %s, salary: %.2f, startDate: %s", $this->getId(), $this->getJobTitle(), $this->getSalary(), $this->getStartDate()->format('Y-m-d') );
        return $employeeString;
    }
    

    /**
     * Get the value of jobTitle
     *
     * @return string
     */
    public function getJobTitle(): string
    {
        return $this->jobTitle;
    }

    /**
     * Set the value of jobTitle
     *
     * @param string $jobTitle
     *
     * @return self
     */
    public function setJobTitle(string $jobTitle): self
    {
        $this->jobTitle = $jobTitle;

        return $this;
    }

    /**
     * Get the value of salary
     *
     * @return float
     */
    public function getSalary(): float
    {
        return $this->salary;
    }

    /**
     * Set the value of salary
     *
     * @param float $salary
     *
     * @return self
     */
    public function setSalary(float $salary): self
    {
        $this->salary = $salary;

        return $this;
    }

    /**
     * Get the value of startDate
     *
     * @return DateTime
     */
    public function getStartDate(): DateTime
    {
        return $this->startDate;
    }

    /**
     * Set the value of startDate
     *
     * @param DateTime $startDate
     *
     * @return self
     */
    public function setStartDate(DateTime $startDate): self
    {
        $this->startDate = $startDate;

        return $this;
    }

    /**
     * Get the value of awards
     *
     * @return array
     */
    public function getAwards(): array
    {
        return $this->awards;
    }

    /**
     * Set the value of awards
     *
     * @param array $awards
     *
     * @return self
     */
    public function setAwards(array $awards): self
    {
        $this->awards = $awards;

        return $this;
    }
}