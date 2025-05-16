<?php

namespace App\Exports;

use App\Enums\StatusEnum;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class SubmissionsExport implements FromCollection, WithHeadings, WithMapping
{
    private $formSubmissions;

    public function __construct(Collection $formSubmissions)
    {
        $this->formSubmissions = $formSubmissions;
    }

    /**
     * @return Collection
     */
    public function collection()
    {
        return $this->formSubmissions->map(function ($submission) {
            $data = json_decode($submission->data, true) ?: [];

            $data['Telefon'] = $data['prefix'] . $data['mobile'];

            unset($data['prefix'], $data['mobile']);

            return array_merge($data, [
                'created_at' => $submission->created_at->format('Y-m-d H:i:s'),
                'status'     => $submission->status_title,
                'service'    => $submission->form?->service?->title,
                'note'       => $submission->note,
            ]);
        });
    }

    public function headings(): array
    {
        $firstSubmission = $this->formSubmissions->first();
        $data            = json_decode($firstSubmission->data, true) ?: [];

        // Remove unwanted keys from headings
        unset($data['prefix'], $data['mobile']);

        return array_merge(array_keys($data), ['Telefon', 'Tarix', 'Status', 'Xidmət', 'Qeyd']);
    }

    public function map($submission): array
    {
        return $submission;
    }
}
