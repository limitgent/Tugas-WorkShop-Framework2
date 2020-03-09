<!-- comtroler ini berisi tentang parsing data dari data yang di ambil dari model view CI-->
<?php 

class Crud extends CI_Controller{

	function __construct(){
		parent::__construct();		
		$this->load->model('m_data');
                $this->load->helper('url');
	}

	function index(){
		$data['user'] = $this->m_data->tampil_data()->result();
        $this->load->view('v_tampilan',$data);

    }
    function tambah(){
		$this->load->view('v_input');
	}
 //-- fungsi syntax tambah aksi untuk input ini berfungsi menangkap inputan dari form kemudian di jadikan array--//
	function tambah_aksi(){
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
		$pekerjaan = $this->input->post('pekerjaan');
 
		$data = array(
			'nama' => $nama,
			'alamat' => $alamat,
			'pekerjaan' => $pekerjaan
			);
		$this->m_data->input_data($data,'user');
		redirect('crud/index');
    }
    //-- Perhatikan pada sintak $id di bawh ini , sytax tersebut berfungsi menangkap data id yang di kirim melaluli url dari link hapus--//
    function hapus($id){
        $where = array('id' => $id);
        $this->m_data->hapus_data($where,'user');
        redirect('crud/index');
    }
    //--perhatikan fungsi result() di sini digunakan unutk meng generate hasil query menjadi array dan kita tampilkan oad view--//
    function edit($id){
        $where = array('id' => $id);
        $data['user'] = $this->m_data->edit_data($where,'user')->result();
        $this->load->view('v_edit',$data);
    }
    //--ini dalah syntax aksi unutk menghendle update data--//
    function update(){
        //-- di sini kita tangkap dulu data dari form edit--//
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $alamat = $this->input->post('alamat');
        $pekerjaan = $this->input->post('pekerjaan');
        // disini tenpat masuknya data yang akan di update ke dalm variabe; data--//
        $data = array(
            'nama' => $nama,
            'alamat' => $alamat,
            'pekerjaan' => $pekerjaan
        );
        //-- dan fariabel where ynag menjadi penentu data yang di update(id yang mana)--//
        $where = array(
            'id' => $id
        );
        // kemudian syntax di bawh ini unutk menghendle update data pada database--//
        $this->m_data->update_data($where,$data,'user');
        redirect('crud/index');
    }
}