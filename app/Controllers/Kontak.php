<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\M_group;
use App\Models\M_contact;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Kontak extends ResourceController
{

    protected $helpers = ['custom'];

    function __construct()
    {
        $this->group = new M_group();
        $this->contact = new M_contact();
    }

    public function index()
    {
        $data['contact'] = $this->contact->getAll();
        return view('kontak/index', $data);
    }

    public function show($id = null)
    {
        //
    }

    public function new()
    {
        $data['groups'] = $this->group->findAll();
        return view('kontak/new', $data);
    }

    public function create()
    {
        $data = $this->request->getGetPost();
        $save = $this->contact->insert($data);
        if (!$save) {
            return redirect()->back()->withInput()->with('errors', $this->contact->errors());
        } else {
            return redirect()->to(site_url('kontak'))->with('success', 'Data Berhasil Di Simpan');
        }

        return redirect()->to(site_url('kontak'))->with('success', 'Data Berhasil Di Tambahkan');
    }

    public function edit($id = null)
    {
        $contact = $this->contact->find($id);
        if (is_object($contact)) {
            $data['contact'] = $contact;
            $data['groups'] = $this->group->findAll();
            return view('kontak/edit', $data);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        return view('kontak/edit');
    }

    public function update($id = null)
    {
        $data = $this->request->getPost();
        $save = $this->contact->update($id, $data);
        if (!$save) {
            return redirect()->back()->withInput()->with('errors', $this->contact->errors());
        } else {
            return redirect()->to(site_url('kontak'))->with('success', 'Data Berhasil Di Update');
        }
    }

    public function delete($id = null)
    {
        $this->contact->delete($id);
        return redirect()->to(site_url('kontak'))->with('success', 'Hapus Data');
    }

    public function export()
    {
        // install php Spreadsheet melalui terminal
        $contacts = $this->contact->findAll();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Nama');
        $sheet->setCellValue('C1', 'Alias');
        $sheet->setCellValue('D1', 'Telepon');
        $sheet->setCellValue('E1', 'Email');
        $sheet->setCellValue('F1', 'Alamat');
        $sheet->setCellValue('G1', 'Info');

        $coloumn = 2;
        foreach ($contacts as $key => $value) {
            $sheet->setCellValue('A' . $coloumn, ($coloumn - 1));
            $sheet->setCellValue('B' . $coloumn, $value->name_contact);
            $sheet->setCellValue('C' . $coloumn, $value->name_alias);
            $sheet->setCellValue('D' . $coloumn, $value->phone);
            $sheet->setCellValue('E' . $coloumn, $value->email);
            $sheet->setCellValue('F' . $coloumn, $value->address);
            $sheet->setCellValue('G' . $coloumn, $value->info_contact);
            $coloumn++;
        }

        $sheet->getStyle('A1:G1')->getFont()->setBold(true);
        $sheet->getStyle('A1:G1')->getFill()
            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()->setARGB('FFFFFF00');
        $styleArray = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['argb' => 'FF000000'],
                ],
            ],
        ];
        $sheet->getStyle('A1:G' . ($coloumn - 1))->applyFromArray($styleArray);

        $sheet->getColumnDimension('A')->setAutoSize(true);
        $sheet->getColumnDimension('B')->setAutoSize(true);
        $sheet->getColumnDimension('C')->setAutoSize(true);
        $sheet->getColumnDimension('D')->setAutoSize(true);
        $sheet->getColumnDimension('E')->setAutoSize(true);
        $sheet->getColumnDimension('F')->setAutoSize(true);
        $sheet->getColumnDimension('G')->setAutoSize(true);

        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=contacts.xlsx');
        header('Cache-Contro: max-age=0');
        $writer->save('php://output');
        exit();
    }

    public function import()
    {
        $file = $this->request->getFile('file_excel');
        $extension = $file->getClientExtension();
        if ($extension == 'xlsx' || $extension == 'xls') {
            if ($extension == 'xls') {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
            } else {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            }
            $spreadsheet = $reader->load($file);
            $contact = $spreadsheet->getActiveSheet()->toArray();
            foreach ($contact as $key => $value) {
                if ($key == 0) {
                    continue;
                }
                $data = [
                    'name_contact' => $value[1],
                    'name_alias'   => $value[2],
                    'phone'        => $value[3],
                    'email'        => $value[4],
                    'address'      => $value[5],
                    'info_contact' => $value[6],
                    'id_group'     => 0,
                ];
                $this->contact->insert($data);
            }
            return redirect()->back()->with('success', 'Data Berhasil Di Tambahkan');
        } else {
            return redirect()->back()->with('error', 'Format File Tidak Sesuai');
        }
    }
}
