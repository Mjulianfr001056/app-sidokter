<?php

namespace App\Services;

use App\DTOs\PegawaiDTO;
use App\Entities\PegawaiEntity;
use Illuminate\Support\Facades\Http;

class PegawaiService
{
    protected $apiBaseUrl;

    public function __construct()
    {
        $this->apiBaseUrl = config('services.api.base_url') . '/pegawai';
    }

    public function getPegawai(): array
    {
        $response = Http::get($this->apiBaseUrl);
        if ($response->successful()) {
            $data = $response->json(['data']);

            $pegawaiEntities = [];

            foreach ($data as $item) {
                $pegawaiDTO = new PegawaiDTO($item);

                $pegawaiEntity = new PegawaiEntity(
                    $pegawaiDTO->id,
                    $pegawaiDTO->nip,
                    $pegawaiDTO->nipBps,
                    $pegawaiDTO->nama,
                    $pegawaiDTO->alias,
                    $pegawaiDTO->jabatan,
                    $pegawaiDTO->golongan
                );

                $pegawaiEntities[] = $pegawaiEntity;
            }

            return $pegawaiEntities;
        } else {
            throw new \Exception('Failed to fetch PegawaiController data from API');
        }
    }

    public function getPegawaiById($id)
    {
        $response = Http::get($this->apiBaseUrl . '/' . $id);
        if ($response->successful()) {
            $data = $response->json(['data']);
            $pegawaiDTO = new PegawaiDTO($data);

            $pegawaiEntity = new PegawaiEntity(
                $pegawaiDTO->id,
                $pegawaiDTO->nip,
                $pegawaiDTO->nipBps,
                $pegawaiDTO->nama,
                $pegawaiDTO->alias,
                $pegawaiDTO->jabatan,
                $pegawaiDTO->golongan
            );

            return $pegawaiEntity;
        } else {
            throw new \Exception('Failed to fetch PegawaiController data from API');
        }
    }

}
