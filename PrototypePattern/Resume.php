<?php


/**
 * 工作经历
 * Class WorkExperience
 */
class WorkExperience
{
    private string $workDate;  // 工作时间
    private string $company;   // 公司名称

    /**
     * 设置工作时间
     */
    public function setWorkDate($workDate)
    {
        return $this->workDate = $workDate;
    }

    /**
     * 设置公司名称
     */
    public function setCompany($company)
    {
        return $this->company = $company;
    }

    /**
     * 获取工作时间
     */
    public function getWorkDate()
    {
        return $this->workDate;
    }

    /**
     * 获取公司名称
     */
    public function getCompany()
    {
        return $this->company;
    }
}

/**
 * 简历类
 * Class Resume
 */
class Resume
{
    private string $name;
    private string $sex;
    private string $age;

    private WorkExperience $work;

    public function __construct(string $name)
    {
        $this->name = $name;
        $this->work = new WorkExperience();
    }

    /**
     * 设置个人信息
     * @param string $sex
     * @param string $age
     */
    public function setPersonalInfo(string $sex, string $age)
    {
        $this->sex = $sex;
        $this->age = $age;
    }

    /**
     * 设置工作经历
     * @param string $workData
     * @param string $company
     */
    public function setWorkExperience(string $workData, string $company)
    {
        $this->work->setCompany($company);
        $this->work->setWorkDate($workData);
    }
}