<?php defined('BASEPATH') or exit('No direct script access allowed');
/*| --------------------------------------------------------------------------*/
/*| dev : royyan  */
/*| version : V.0.0.2 */
/*| facebook :  */
/*| fanspage :  */
/*| instagram :  */
/*| youtube :  */
/*| --------------------------------------------------------------------------*/
/*| Generate By M-CRUD Generator 09/11/2023 16:05*/
/*| Please DO NOT modify this information*/

class Product extends Backend
{
    private $title = 'Product';

    public function __construct()
    {
        $config = [
            'title' => $this->title,
        ];
        parent::__construct($config);
        $this->load->model('Product_model', 'model');
    }

    function index()
    {
        $this->is_allowed('product_list');
        $this->template->set_title($this->title);
        $this->template->view('index');
    }

    function json()
    {
        if ($this->input->is_ajax_request()) {
            if (!is_allowed('product_list')) {
                show_error('Access Permission', 403, '403::Access Not Permission');
                exit();
            }

            $list = $this->model->get_datatables();
            $data = [];
            foreach ($list as $row) {
                $rows = [];
                $rows[] = $row->name;
                $rows[] = strlen($row->description) > 50 ? substr($row->description, 0, 50) . '...' : $row->description;
                $rows[] = is_image($row->img, '', 'width:auto;height:40px');
                $rows[] = is_image($row->img_icon, '', 'width:auto;height:40px');
                $rows[] = is_image($row->img_pricelist, '', 'width:auto;height:40px');

                $rows[] =
                    '
                  <div class="btn-group" role="group" aria-label="Basic example">
                      <a href="' .
                    url('product/detail/' . enc_url($row->id)) .
                    '" id="detail" class="btn btn-primary" title="' .
                    cclang('detail') .
                    '">
                        <i class="mdi mdi-file"></i>
                      </a>
                      <a href="' .
                    url('product/update/' . enc_url($row->id)) .
                    '" id="update" class="btn btn-warning" title="' .
                    cclang('update') .
                    '">
                        <i class="ti-pencil"></i>
                      </a>
                      <a href="' .
                    url('product/delete/' . enc_url($row->id)) .
                    '" id="delete" class="btn btn-danger" title="' .
                    cclang('delete') .
                    '">
                        <i class="ti-trash"></i>
                      </a>
                    </div>
                 ';

                $data[] = $rows;
            }

            $output = [
                'draw' => $_POST['draw'],
                'recordsTotal' => $this->model->count_all(),
                'recordsFiltered' => $this->model->count_filtered(),
                'data' => $data,
            ];
            //output to json format
            return $this->response($output);
        }
    }

    function filter()
    {
        if (!is_allowed('product_filter')) {
            echo 'access not permission';
        } else {
            $this->template->view('filter', [], false);
        }
    }

    function detail($id)
    {
        $this->is_allowed('product_detail');
        $this->load->helper('download');
        
        if ($row = $this->model->find(dec_url($id))) {
            $this->template->set_title('Detail ' . $this->title);
            $data = [
                'name' => $row->name,
                'description' => $row->description,
                'img' => $row->img,
                'img_icon' => $row->img_icon,
                'img_pricelist' => $row->img_pricelist,
            ];
            $this->template->view('view', $data);
        } else {
            $this->error404();
        }
    }

    function add()
    {
        $this->is_allowed('product_add');
        $this->template->set_title(cclang('add') . ' ' . $this->title);
        $data = [
        'action' => url('product/add_action'), 
        'name' => set_value('name'), 
        'description' => set_value('description'), 
        'img' => set_value('img'), 
        'img_icon' => set_value('img_icon')];
        $this->template->view('add', $data);
    }

    function add_action()
    {
        if ($this->input->is_ajax_request()) {
            if (!is_allowed('product_add')) {
                show_error('Access Permission', 403, '403::Access Not Permission');
                exit();
            }

            $json = ['success' => false];
            $this->form_validation->set_rules('name', '* Name', 'trim|xss_clean|required');
            $this->form_validation->set_rules('description', '* Description', 'trim|xss_clean|required');
            $this->form_validation->set_rules('img', '* Img', 'trim|xss_clean|required');
            $this->form_validation->set_rules('img_icon', '* Img icon', 'trim|xss_clean|required');
            $this->form_validation->set_rules('img_pricelist', '* Img price list', 'trim|xss_clean|required');
            $this->form_validation->set_error_delimiters('<i class="error text-danger" style="font-size:11px">', '</i>');

            if ($this->form_validation->run()) {
                $save_data['name'] = $this->input->post('name', true);
                $save_data['description'] = $this->input->post('description', true);
                $save_data['img'] = $this->imageCopy($this->input->post('img', true), $_POST['file-dir-img']);
                $save_data['img_icon'] = $this->imageCopy($this->input->post('img_icon', true), $_POST['file-dir-img_icon']);
                $save_data['img_pricelist'] = $this->imageCopy($this->input->post('img_pricelist', true), $_POST['file-dir-img_pricelist']);

                $this->model->insert($save_data);

                set_message('success', cclang('notif_save'));
                $json['redirect'] = url('product');
                $json['success'] = true;
            } else {
                foreach ($_POST as $key => $value) {
                    $json['alert'][$key] = form_error($key);
                }
            }

            $this->response($json);
        }
    }

    function update($id)
    {
        $this->is_allowed('product_update');
        if ($row = $this->model->find(dec_url($id))) {
            $this->template->set_title(cclang('update') . ' ' . $this->title);
            $data = [
            'action' => url("product/update_action/$id"), 
            'name' => set_value('name', $row->name), 
            'description' => set_value('description', $row->description), 
            'img' => set_value('img', $row->img), 
            'img_icon' => set_value('img_icon', $row->img_icon)];
            $this->template->view('update', $data);
        } else {
            $this->error404();
        }
    }

    function update_action($id)
    {
        if ($this->input->is_ajax_request()) {
            if (!is_allowed('product_update')) {
                show_error('Access Permission', 403, '403::Access Not Permission');
                exit();
            }

            $json = ['success' => false];
            $this->form_validation->set_rules('name', '* Name', 'trim|xss_clean|required');
            $this->form_validation->set_rules('description', '* Description', 'trim|xss_clean|required');
            $this->form_validation->set_rules('img', '* Img', 'trim|xss_clean|required');
            $this->form_validation->set_rules('img_icon', '* Img icon', 'trim|xss_clean|required');
            $this->form_validation->set_rules('img_pricelist', '* Img price list', 'trim|xss_clean|required');
            $this->form_validation->set_error_delimiters('<i class="error text-danger" style="font-size:11px">', '</i>');

            if ($this->form_validation->run()) {
                $save_data['name'] = $this->input->post('name', true);
                $save_data['description'] = $this->input->post('description', true);
                $save_data['img'] = $this->imageCopy($this->input->post('img', true), $_POST['file-dir-img']);
                $save_data['img_icon'] = $this->imageCopy($this->input->post('img_icon', true), $_POST['file-dir-img_icon']);
                $save_data['img_pricelist'] = $this->imageCopy($this->input->post('img_pricelist', true), $_POST['file-dir-img_pricelist']);

                $save = $this->model->change(dec_url($id), $save_data);

                set_message('success', cclang('notif_update'));

                $json['redirect'] = url('product');
                $json['success'] = true;
            } else {
                foreach ($_POST as $key => $value) {
                    $json['alert'][$key] = form_error($key);
                }
            }

            $this->response($json);
        }
    }

    function delete($id)
    {
        if ($this->input->is_ajax_request()) {
            if (!is_allowed('product_delete')) {
                return $this->response([
                    'type_msg' => 'error',
                    'msg' => 'do not have permission to access',
                ]);
            }

            $this->model->remove(dec_url($id));
            $json['type_msg'] = 'success';
            $json['msg'] = cclang('notif_delete');

            return $this->response($json);
        }
    }
}

/* End of file Product.php */
/* Location: ./application/modules/product/controllers/backend/Product.php */
