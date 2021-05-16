<?php

namespace Tests\Feature\Charts;

use Symfony\Component\HttpFoundation\Response;
use Exception;
use Tests\TestCase;

class ChartTest extends TestCase
{
    /**
     * Check if all charts could be obtained.
     *
     * @return void
     */
    public function test_can_obtain_all_charts(): void
    {
        $this->json('GET', 'api/charts', [], [
            'Accept' => 'application/json',
            'Application' => config('app.api_key')
        ])->assertStatus(RESPONSE::HTTP_OK);
    }

    /**
     * Check if single chart could be obtained.
     *
     * @return void
     * @throws Exception
     */
    public function test_can_obtain_single_chart(): void
    {
        $chart = random_int(1, 14);

        $this->json('GET', 'api/charts/' . $chart, [], [
            'Accept' => 'application/json',
            'Application' => config('app.api_key')
        ])->assertStatus(RESPONSE::HTTP_OK);
    }

    /**
     * Check if additional data for single chart could be obtained.
     *
     * @return void
     * @throws Exception
     */
    public function test_can_obtain_additional_data_single_chart(): void
    {
        $chart = random_int(1, 14);

        $this->json('GET', 'api/charts/'. $chart . '/data', [], [
            'Accept' => 'application/json',
            'Application' => config('app.api_key')
        ])->assertStatus(RESPONSE::HTTP_OK);
    }
}
