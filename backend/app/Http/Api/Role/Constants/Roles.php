<?php

namespace App\Http\Api\Role\Constants;

/**
|--------------------------------------------------------------------------
| Roles
|--------------------------------------------------------------------------
|
| This class is a type of constants, in which we have
| access to all roles with their names and descriptions.
|
| @author David Ivanov <david4obgg1@gmail.com>
 */
class Roles
{
    /**
     * Admin is a role, which is set on the main user. He has all permissions and can manage anything.
     *
     * @var string
     */
    public const ADMIN_ROLE = 1;

    /**
     * Employee Self Service is a role, which is set on the default user.
     *
     * @var string
     */
    public const EMPLOYEE_SELF_SERVICE_ROLE = 2;

    /**
     * Manager Chart is a role, which is set on the general manager of the table, charts. He can manage anything about charts.
     *
     * @var string
     */
    public const MANAGER_CHART_ROLE = 3;

    /**
     * Manager Chart Slots by Processing is a role, which is set on the manager of the table, also he can manage anything about slots by processing chart.
     *
     * @var string
     */
    public const MANAGER_CHART_SLOTS_BY_PROCESSING_ROLE = 4;

    /**
     * Manager Chart Slots By ADC activity is a role, which is set on the manager of the table, also he can manage anything about slots by adc activity chart.
     *
     * @var string
     */
    public const MANAGER_CHART_SLOTS_BY_ADC_ACTIVITY_ROLE = 5;

    /**
     * Manager Chart Slots by Job Type is a role, which is set on the manager of the table, also he can manage anything about slots by job type chart.
     *
     * @var string
     */
    public const MANAGER_CHART_SLOTS_BY_JOB_TYPE_ROLE = 6;

    /**
     * Manager Chart Slots vs n-cores, which is set on the manager of the table, also he can manage anything about slots by n-cores chart.
     *
     * @var string
     */
    public const MANAGER_CHART_SLOTS_VS_N_CORES_ROLE = 7;

    /**
     * Manager Chart Slots by processing clouds is a role, which is set on the manager of the table, also he can manage anything about slots by processing clouds chart.
     *
     * @var string
     */
    public const MANAGER_CHART_SLOTS_BY_PROCESSING_CLOUDS_ROLE = 8;

    /**
     * Manager Chart Slots by panda resources is a role, which is set on the manager of the table, also he can manage anything about slots by panda resources chart.
     *
     * @var string
     */
    public const MANAGER_CHART_SLOTS_BY_PANDA_RESOURCES_ROLE = 9;

    /**
     * Manager Chart Slots of running jobs HS06 is a role, which is set on the manager of the table, also he can manage anything about slots of running jobs HS06 chart.
     *
     * @var string
     */
    public const MANAGER_CHART_SLOTS_OF_RUNNING_JOBS_HS06_ROLE = 10;

    /**
     * Manager Chart Bytes processed is a role, which is set on the manager of the table, also he can manage anything about bytes processed chart.
     *
     * @var string
     */
    public const MANAGER_CHART_BYTES_PROCESSED_ROLE = 11;

    /**
     * Manager Chart Files processed is a role, which is set on the manager of the table, also he can manage anything about files processed chart.
     *
     * @var string
     */
    public const MANAGER_CHART_FILES_PROCESSED_ROLE = 12;

    /**
     * Manager Chart Events processed is a role, which is set on the manager of the table, also he can manage anything about events processed chart.
     *
     * @var string
     */
    public const MANAGER_CHART_EVENTS_PROCESSED_ROLE = 13;

    /**
     * Manager Chart Events simul+pile is a role, which is set on the manager of the table, also he can manage anything about events simul+pile chart.
     *
     * @var string
     */
    public const MANAGER_CHART_EVENTS_SIMUL_PILE_ROLE = 14;

    /**
     * Manager Chart Events merge+pmerge is a role, which is set on the manager of the table, also he can manage anything about events merge+pmerge chart.
     *
     * @var string
     */
    public const MANAGER_CHART_EVENTS_MERGE_PMERGE_ROLE = 15;

    /**
     * Manager Chart WallClock Consumption is a role, which is set on the manager of the table, also he can manage anything about wallclock consumption chart.
     *
     * @var string
     */
    public const MANAGER_CHART_WALLCLOCK_CONSUMPTION_ROLE = 16;

    /**
     * Manager Chart WallClock Consumption w/o analysis is a role, which is set on the manager of the table, also he can manage anything about wallclock consumption w/o analysis chart.
     *
     * @var string
     */
    public const MANAGER_CHART_WALLCLOCK_CONSUMPTION_W_O_ANALYSIS_ROLE = 17;

    /**
     * Manager Table is a role, which is set on the general manager of the table, charts. He can manage anything about charts.
     *
     * @var string
     */
    public const MANAGER_TABLE_ROLE = 18;

    /**
     * Manager Table Slots by Processing is a role, which is set on the manager of the table, also he can manage anything about slots by processing table.
     *
     * @var string
     */
    public const MANAGER_TABLE_SLOTS_BY_PROCESSING_ROLE = 19;

    /**
     * Manager Table Slots By ADC activity is a role, which is set on the manager of the table, also he can manage anything about slots by adc activity table.
     *
     * @var string
     */
    public const MANAGER_TABLE_SLOTS_BY_ADC_ACTIVITY_ROLE = 20;

    /**
     * Manager Table Slots by Job Type is a role, which is set on the manager of the table, also he can manage anything about slots by job type table.
     *
     * @var string
     */
    public const MANAGER_TABLE_SLOTS_BY_JOB_TYPE_ROLE = 21;

    /**
     * Manager Table Slots vs n-cores, which is set on the manager of the table, also he can manage anything about slots by n-cores table.
     *
     * @var string
     */
    public const MANAGER_TABLE_SLOTS_VS_N_CORES_ROLE = 22;

    /**
     * Manager Table Slots by processing clouds is a role, which is set on the manager of the table, also he can manage anything about slots by processing clouds table.
     *
     * @var string
     */
    public const MANAGER_TABLE_SLOTS_BY_PROCESSING_CLOUDS_ROLE = 23;

    /**
     * Manager Table Slots by panda resources is a role, which is set on the manager of the table, also he can manage anything about slots by panda resources table.
     *
     * @var string
     */
    public const MANAGER_TABLE_SLOTS_BY_PANDA_RESOURCES_ROLE = 24;

    /**
     * Manager Table Slots of running jobs HS06 is a role, which is set on the manager of the table, also he can manage anything about slots of running jobs HS06 table.
     *
     * @var string
     */
    public const MANAGER_TABLE_SLOTS_OF_RUNNING_JOBS_HS06_ROLE = 25;

    /**
     * Manager Table Bytes processed is a role, which is set on the manager of the table, also he can manage anything about bytes processed table.
     *
     * @var string
     */
    public const MANAGER_TABLE_BYTES_PROCESSED_ROLE = 26;

    /**
     * Manager Table Files processed is a role, which is set on the manager of the table, also he can manage anything about files processed table.
     *
     * @var string
     */
    public const MANAGER_TABLE_FILES_PROCESSED_ROLE = 27;

    /**
     * Manager Table Events processed is a role, which is set on the manager of the table, also he can manage anything about events processed table.
     *
     * @var string
     */
    public const MANAGER_TABLE_EVENTS_PROCESSED_ROLE = 28;

    /**
     * Manager Table Events simul+pile is a role, which is set on the manager of the table, also he can manage anything about events simul+pile table.
     *
     * @var string
     */
    public const MANAGER_TABLE_EVENTS_SIMUL_PILE_ROLE = 29;

    /**
     * Manager Table Events merge+pmerge is a role, which is set on the manager of the table, also he can manage anything about events merge+pmerge table.
     *
     * @var string
     */
    public const MANAGER_TABLE_EVENTS_MERGE_PMERGE_ROLE = 30;

    /**
     * Manager Table WallClock Consumption is a role, which is set on the manager of the table, also he can manage anything about wallclock consumption table.
     *
     * @var string
     */
    public const MANAGER_TABLE_WALLCLOCK_CONSUMPTION_ROLE = 31;

    /**
     * Manager Table WallClock Consumption w/o analysis is a role, which is set on the manager of the table, also he can manage anything about wallclock consumption w/o analysis table.
     *
     * @var string
     */
    public const MANAGER_TABLE_WALLCLOCK_CONSUMPTION_W_O_ANALYSIS_ROLE = 32;
}
