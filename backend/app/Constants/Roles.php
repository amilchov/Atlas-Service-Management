<?php

namespace App\Constants;

class Roles
{
    /**
     * Admin is a role, which is set on the main user. He has all permissions and can manage anything.
     *
     * @var string
     */
    public const ADMIN_ROLE = 'admin';

    /**
     * Employee Self Service is a role, which is set on the default user.
     *
     * @var string
     */
    public const EMPLOYEE_SELF_SERVICE_ROLE = 'ess';

    /**
     * Manager Chart is a role, which is set on the general manager of the table, charts. He can manage anything about charts.
     *
     * @var string
     */
    public const MANAGER_CHART_ROLE = 'manager_chart';

    /**
     * Manager Chart Slots by Processing is a role, which is set on the manager of the table, also he can manage anything about slots by processing chart.
     *
     * @var string
     */
    public const MANAGER_CHART_SLOTS_BY_PROCESSING_ROLE = 'manager_chart_slots_by_processing';

    /**
     * Manager Chart Slots By ADC activity is a role, which is set on the manager of the table, also he can manage anything about slots by adc activity chart.
     *
     * @var string
     */
    public const MANAGER_CHART_SLOTS_BY_ADC_ACTIVITY_ROLE = 'manager_chart_slots_by_adc_activity';

    /**
     * Manager Chart Slots by Job Type is a role, which is set on the manager of the table, also he can manage anything about slots by job type chart.
     *
     * @var string
     */
    public const MANAGER_CHART_SLOTS_BY_JOB_TYPE_ROLE = 'manager_chart_slots_by_job_type';

    /**
     * Manager Chart Slots vs n-cores, which is set on the manager of the table, also he can manage anything about slots by n-cores chart.
     *
     * @var string
     */
    public const MANAGER_CHART_SLOTS_VS_N_CORES_ROLE = 'manager_chart_slots_vs_n-cores';

    /**
     * Manager Chart Slots by processing clouds is a role, which is set on the manager of the table, also he can manage anything about slots by processing clouds chart.
     *
     * @var string
     */
    public const MANAGER_CHART_SLOTS_BY_PROCESSING_CLOUDS_ROLE = 'manager_chart_slots_by_processing_clouds';

    /**
     * Manager Chart Slots by panda resources is a role, which is set on the manager of the table, also he can manage anything about slots by panda resources chart.
     *
     * @var string
     */
    public const MANAGER_CHART_SLOTS_BY_PANDA_RESOURCES_ROLE = 'manager_chart_slots_by_panda_resources';

    /**
     * Manager Chart Slots of running jobs HS06 is a role, which is set on the manager of the table, also he can manage anything about slots of running jobs HS06 chart.
     *
     * @var string
     */
    public const MANAGER_CHART_SLOTS_OF_RUNNING_JOBS_HS06_ROLE = 'manager_chart_slots_of_running_jobs_hs06';

    /**
     * Manager Chart Bytes processed is a role, which is set on the manager of the table, also he can manage anything about bytes processed chart.
     *
     * @var string
     */
    public const MANAGER_CHART_BYTES_PROCESSED_ROLE = 'manager_chart_bytes_processed';

    /**
     * Manager Chart Files processed is a role, which is set on the manager of the table, also he can manage anything about files processed chart.
     *
     * @var string
     */
    public const MANAGER_CHART_FILES_PROCESSED_ROLE = 'manager_chart_files_processed';

    /**
     * Manager Chart Events processed is a role, which is set on the manager of the table, also he can manage anything about events processed chart.
     *
     * @var string
     */
    public const MANAGER_CHART_EVENTS_PROCESSED_ROLE = 'manager_chart_events_processed';

    /**
     * Manager Chart Events simul+pile is a role, which is set on the manager of the table, also he can manage anything about events simul+pile chart.
     *
     * @var string
     */
    public const MANAGER_CHART_EVENTS_SIMUL_PILE_ROLE = 'manager_chart_events_simul+pile';

    /**
     * Manager Chart Events merge+pmerge is a role, which is set on the manager of the table, also he can manage anything about events merge+pmerge chart.
     *
     * @var string
     */
    public const MANAGER_CHART_EVENTS_MERGE_PMERGE_ROLE = 'manager_chart_events_merge+pmerge';

    /**
     * Manager Chart WallClock Consumption is a role, which is set on the manager of the table, also he can manage anything about wallclock consumption chart.
     *
     * @var string
     */
    public const MANAGER_CHART_WALLCLOCK_CONSUMPTION_ROLE = 'manager_chart_wallclock_consumption';

    /**
     * Manager Chart WallClock Consumption w/o analysis is a role, which is set on the manager of the table, also he can manage anything about wallclock consumption w/o analysis chart.
     *
     * @var string
     */
    public const MANAGER_CHART_WALLCLOCK_CONSUMPTION_W_O_ANALYSIS_ROLE = 'manager_chart_wallclock_consumption_w/o_analysis';

    /**
     * Manager Table is a role, which is set on the general manager of the table, charts. He can manage anything about charts.
     *
     * @var string
     */
    public const MANAGER_TABLE_ROLE = 'manager_table';

    /**
     * Manager Table Slots by Processing is a role, which is set on the manager of the table, also he can manage anything about slots by processing table.
     *
     * @var string
     */
    public const MANAGER_TABLE_SLOTS_BY_PROCESSING_ROLE = 'manager_table_slots_by_processing';

    /**
     * Manager Table Slots By ADC activity is a role, which is set on the manager of the table, also he can manage anything about slots by adc activity table.
     *
     * @var string
     */
    public const MANAGER_TABLE_SLOTS_BY_ADC_ACTIVITY_ROLE = 'manager_table_slots_by_adc_activity';

    /**
     * Manager Table Slots by Job Type is a role, which is set on the manager of the table, also he can manage anything about slots by job type table.
     *
     * @var string
     */
    public const MANAGER_TABLE_SLOTS_BY_JOB_TYPE_ROLE = 'manager_table_slots_by_job_type';

    /**
     * Manager Table Slots vs n-cores, which is set on the manager of the table, also he can manage anything about slots by n-cores table.
     *
     * @var string
     */
    public const MANAGER_TABLE_SLOTS_VS_N_CORES_ROLE = 'manager_table_slots_vs_n-cores';

    /**
     * Manager Table Slots by processing clouds is a role, which is set on the manager of the table, also he can manage anything about slots by processing clouds table.
     *
     * @var string
     */
    public const MANAGER_TABLE_SLOTS_BY_PROCESSING_CLOUDS_ROLE = 'manager_table_slots_by_processing_clouds';

    /**
     * Manager Table Slots by panda resources is a role, which is set on the manager of the table, also he can manage anything about slots by panda resources table.
     *
     * @var string
     */
    public const MANAGER_TABLE_SLOTS_BY_PANDA_RESOURCES_ROLE = 'manager_table_slots_by_panda_resources';

    /**
     * Manager Table Slots of running jobs HS06 is a role, which is set on the manager of the table, also he can manage anything about slots of running jobs HS06 table.
     *
     * @var string
     */
    public const MANAGER_TABLE_SLOTS_OF_RUNNING_JOBS_HS06_ROLE = 'manager_table_slots_of_running_jobs_hs06';

    /**
     * Manager Table Bytes processed is a role, which is set on the manager of the table, also he can manage anything about bytes processed table.
     *
     * @var string
     */
    public const MANAGER_TABLE_BYTES_PROCESSED_ROLE = 'manager_table_bytes_processed';

    /**
     * Manager Table Files processed is a role, which is set on the manager of the table, also he can manage anything about files processed table.
     *
     * @var string
     */
    public const MANAGER_TABLE_FILES_PROCESSED_ROLE = 'manager_table_files_processed';

    /**
     * Manager Table Events processed is a role, which is set on the manager of the table, also he can manage anything about events processed table.
     *
     * @var string
     */
    public const MANAGER_TABLE_EVENTS_PROCESSED_ROLE = 'manager_table_events_processed';

    /**
     * Manager Table Events simul+pile is a role, which is set on the manager of the table, also he can manage anything about events simul+pile table.
     *
     * @var string
     */
    public const MANAGER_TABLE_EVENTS_SIMUL_PILE_ROLE = 'manager_table_events_simul+pile';

    /**
     * Manager Table Events merge+pmerge is a role, which is set on the manager of the table, also he can manage anything about events merge+pmerge table.
     *
     * @var string
     */
    public const MANAGER_TABLE_EVENTS_MERGE_PMERGE_ROLE = 'manager_table_events_merge+pmerge';

    /**
     * Manager Table WallClock Consumption is a role, which is set on the manager of the table, also he can manage anything about wallclock consumption table.
     *
     * @var string
     */
    public const MANAGER_TABLE_WALLCLOCK_CONSUMPTION_ROLE = 'manager_table_wallclock_consumption';

    /**
     * Manager Table WallClock Consumption w/o analysis is a role, which is set on the manager of the table, also he can manage anything about wallclock consumption w/o analysis table.
     *
     * @var string
     */
    public const MANAGER_TABLE_WALLCLOCK_CONSUMPTION_W_O_ANALYSIS_ROLE = 'manager_table_wallclock_consumption_w/o_analysis';
}
