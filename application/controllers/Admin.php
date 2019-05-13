<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('Admin/index', $data);
        $this->load->view('templates/footer');
    }


    public function buku()
    {
        $data['title'] = 'Data Buku';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['buku'] = $this->db->get('buku')->result_array();
        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('pengarang', 'Pengarang', 'required');
        $this->form_validation->set_rules('penerbit', 'Penerbit', 'required');
        $this->form_validation->set_rules('tahun', 'Tahun', 'required');
        $this->form_validation->set_rules('isbn', 'ISBN', 'required');
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required');
        $this->form_validation->set_rules('rak', 'Rak Buku', 'required');
        $this->form_validation->set_rules('input', 'Tanggal input buku', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/buku', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'judul' => htmlspecialchars($this->input->post('judul', true)),
                'pengarang' => htmlspecialchars($this->input->post('pengarang', true)),
                'penerbit' => htmlspecialchars($this->input->post('penerbit', true)),
                'tahun_terbit' => htmlspecialchars($this->input->post('tahun', true)),
                'isbn' => htmlspecialchars($this->input->post('isbn', true)),
                'jumlah_buku' => htmlspecialchars($this->input->post('jumlah', true)),
                'rak_buku' => htmlspecialchars($this->input->post('rak', true)),
                'tgl_input' => htmlspecialchars($this->input->post('input', true)),
            ];
            $this->db->insert('buku', $data);
            $this->session->set_flashdata('message', '<div class="alert 
            alert-success" role="alert">Sudah Di Tambahkan!</div>');
            redirect('admin/buku');
        }
    }

    public function anggota()
    {
        $data['title'] = 'Data Anggota';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['anggota'] = $this->db->get('anggota')->result_array();
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('tempat', 'Tempat lahir', 'required');
        $this->form_validation->set_rules('tanggal', 'Tanggal lahir', 'required');
        $this->form_validation->set_rules('jenis', 'Jenis kelamin', 'required');
        $this->form_validation->set_rules('prodi', 'Prodi', 'required');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/anggota', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'tempat_lahir' => htmlspecialchars($this->input->post('tempat', true)),
                'tgl_lahir' => htmlspecialchars($this->input->post('tanggal', true)),
                'jk' => htmlspecialchars($this->input->post('jenis', true)),
                'prodi' => htmlspecialchars($this->input->post('prodi', true)),
            ];
            $this->db->insert('anggota', $data);
            $this->session->set_flashdata('message', '<div class="alert 
            alert-success" role="alert">Sudah Di Tambahkan!</div>');
            redirect('admin/anggota');
        }
    }
}
