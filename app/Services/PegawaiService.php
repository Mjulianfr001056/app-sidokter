<?php

namespace App\Services;

use App\DTOs\PegawaiDTO;
use App\Entities\PegawaiEntity;
use Illuminate\Support\Facades\Http;

class PegawaiService implements BasicRequestServiceInterface
{
    protected $apiUrl;

    public function __construct()
    {
        $this->apiUrl = config('services.api.base_url') . '/pegawai';
    }

    /**
     * @throws \Exception
     */
    public function getAll(): array
    {
        $response = Http::get($this->apiUrl);

        if (!$response->successful()) {
            throw new \Exception('Failed to fetch PegawaiController data from API');
        }

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
                $pegawaiDTO->golongan,
                $pegawaiDTO->status
            );

            $pegawaiEntities[] = $pegawaiEntity;
        }

        return $pegawaiEntities;
    }

    public function getById($id): object
    {
        $response = Http::get($this->apiUrl . '/' . $id);

        if (!$response->successful()) {
            throw new \Exception('Failed to fetch PegawaiController data from API');
        }

        $data = $response->json(['data']);
        $pegawaiDTO = new PegawaiDTO($data);

        $pegawaiEntity = new PegawaiEntity(
            $pegawaiDTO->id,
            $pegawaiDTO->nip,
            $pegawaiDTO->nipBps,
            $pegawaiDTO->nama,
            $pegawaiDTO->alias,
            $pegawaiDTO->jabatan,
            $pegawaiDTO->golongan,
            $pegawaiDTO->status
        );

        return $pegawaiEntity;
    }

    public function create($data): void
    {
        // TODO: Implement create() method.
    }

    public function update($id, $data): void
    {
        // TODO: Implement update() method.
    }

    public function delete($id): void
    {
        // TODO: Implement delete() method.
    }


}
