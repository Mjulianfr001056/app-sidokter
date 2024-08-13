<?php

namespace Tests\Unit;

use App\Services\PegawaiService;
use Illuminate\Support\Facades\Log;
use Tests\TestCase;

class PegawaiServiceTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->service = new PegawaiService();
    }
    public function testGetAll()
    {
        $result = $this->service->getAll();
        dump($result);

        $this->assertIsArray($result);
    }

    public function testGetById()
    {
        $result = $this->service->getById(344);
        dump($result);

        $this->assertIsObject($result);
    }




}
