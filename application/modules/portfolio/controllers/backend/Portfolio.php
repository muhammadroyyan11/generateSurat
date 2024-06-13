<?php defined('BASEPATH') or exit('No direct script access allowed');
/*| --------------------------------------------------------------------------*/
/*| dev : royyan  */
/*| version : V.0.0.2 */
/*| facebook :  */
/*| fanspage :  */
/*| instagram :  */
/*| youtube :  */
/*| --------------------------------------------------------------------------*/
/*| Generate By M-CRUD Generator 18/12/2023 00:15*/
/*| Please DO NOT modify this information*/

class Portfolio extends Backend
{
    private $title = 'Portfolio';

    public function __construct()
    {
        $config = [
            'title' => $this->title,
        ];
        parent::__construct($config);
        $this->load->model('Portfolio_model', 'model');
    }

    function index()
    {
        $this->is_allowed('portfolio_list');
        $this->template->set_title($this->title);
        $this->template->view('index');
    }

    function json()
    {
        if ($this->input->is_ajax_request()) {
            if (!is_allowed('portfolio_list')) {
                show_error('Access Permission', 403, '403::Access Not Permission');
                exit();
            }

            $list = $this->model->get_datatables();
            $data = [];
            foreach ($list as $row) {
                $rows = [];
                $rows[] = $row->name_portfolio;
                $rows[] = strlen($row->desc_portfolio) > 100 ? substr($row->desc_portfolio, 0, 100) . '...' : $row->desc_portfolio;
                $rows[] = imgView($row->image, '', 'width:auto;height:40px');
                $rows[] = $row->client_name;
                $rows[] = $row->category;
                $rows[] = date('d-m-Y', strtotime($row->project_date));
                $rows[] = $row->pic;
                $rows[] = $row->jabatan;
                $rows[] = $row->rate_quality;
                $rows[] = $row->rate_awareness;
                $rows[] = $row->rate_service;
                $rows[] = $row->rate_professionalism;
                $rows[] = $row->rate_facility;
                $rows[] = $row->rate_project_focus;
                $rows[] = $row->rate_safety_aspect;
                $rows[] = $row->rate_competitiveness;

                $rows[] =
                    '
                  <div class="btn-group" role="group" aria-label="Basic example">
                      <a href="' .
                    url('portfolio/detail/' . enc_url($row->id)) .
                    '" id="detail" class="btn btn-primary" title="' .
                    cclang('detail') .
                    '">
                        <i class="mdi mdi-file"></i>
                      </a>
                      <a href="' .
                    url('portfolio/update/' . enc_url($row->id)) .
                    '" id="update" class="btn btn-warning" title="' .
                    cclang('update') .
                    '">
                        <i class="ti-pencil"></i>
                      </a>
                      <a href="' .
                    url('portfolio/delete/' . enc_url($row->id)) .
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
        if (!is_allowed('portfolio_filter')) {
            echo 'access not permission';
        } else {
            $this->template->view('filter', [], false);
        }
    }

    function detail($id)
    {
        $this->is_allowed('portfolio_detail');
        if ($row = $this->model->find(dec_url($id))) {
            $this->template->set_title('Detail ' . $this->title);
            $data = [
                'name_portfolio' => $row->name_portfolio,
                'desc_portfolio' => $row->desc_portfolio,
                'image' => $row->image,
                'client_name' => $row->client_name,
                'category' => $row->category,
                'project_date' => $row->project_date,
                'pic' => $row->pic,
                'jabatan' => $row->jabatan,
                'rate_quality' => $row->rate_quality,
                'rate_awareness' => $row->rate_awareness,
                'rate_service' => $row->rate_service,
                'rate_professionalism' => $row->rate_professionalism,
                'rate_facility' => $row->rate_facility,
                'rate_project_focus' => $row->rate_project_focus,
                'rate_safety_aspect' => $row->rate_safety_aspect,
                'rate_competitiveness' => $row->rate_competitiveness,
            ];
            $this->template->view('view', $data);
        } else {
            $this->error404();
        }
    }

    function add()
    {
        $this->is_allowed('portfolio_add');
        $this->template->set_title(cclang('add') . ' ' . $this->title);
        $data = [
            'action' => url('portfolio/add_action'),
            'name_portfolio' => set_value('name_portfolio'),
            'desc_portfolio' => set_value('desc_portfolio'),
            'image' => set_value('image'),
            'client_name' => set_value('client_name'),
            'category' => set_value('category'),
            'project_date' => set_value('project_date'),
            'pic' => set_value('pic'),
            'jabatan' => set_value('jabatan'),
            'rate_quality' => set_value('rate_quality'),
            'rate_awareness' => set_value('rate_awareness'),
            'rate_service' => set_value('rate_service'),
            'rate_professionalism' => set_value('rate_professionalism'),
            'rate_facility' => set_value('rate_facility'),
            'rate_project_focus' => set_value('rate_project_focus'),
            'rate_safety_aspect' => set_value('rate_safety_aspect'),
            'rate_competitiveness' => set_value('rate_competitiveness'),
            'pimpinan' => $this->db
                ->select(['nama', 'jabatan'])
                ->get('pimpinan')
                ->result_array(),
        ];
        $this->template->view('add', $data);
    }

    function add_action()
    {
        if ($this->input->is_ajax_request()) {
            if (!is_allowed('portfolio_add')) {
                show_error('Access Permission', 403, '403::Access Not Permission');
                exit();
            }

            $json = ['success' => false];
            $this->form_validation->set_rules('name_portfolio', '* Name portfolio', 'trim|xss_clean|required');
            $this->form_validation->set_rules('desc_portfolio', '* Desc portfolio', 'trim|xss_clean|required');
            $this->form_validation->set_rules('image', '* Image', 'trim|xss_clean|required');
            $this->form_validation->set_rules('client_name', '* Client name', 'trim|xss_clean|required');
            $this->form_validation->set_rules('category', '* Category', 'trim|xss_clean|required');
            $this->form_validation->set_rules('project_date', '* Project date', 'trim|xss_clean|required');
            $this->form_validation->set_rules('pic', '* Pic', 'trim|xss_clean|required');
            $this->form_validation->set_rules('jabatan', '* Jabatan', 'trim|xss_clean|required');
            $this->form_validation->set_rules('rate_quality', '* Rate quality', 'trim|xss_clean|numeric|greater_than_equal_to[1]|less_than_equal_to[5]');
            $this->form_validation->set_rules('rate_awareness', '* Rate awareness', 'trim|xss_clean|numeric|greater_than_equal_to[1]|less_than_equal_to[5]');
            $this->form_validation->set_rules('rate_service', '* Rate service', 'trim|xss_clean|numeric|greater_than_equal_to[1]|less_than_equal_to[5]');
            $this->form_validation->set_rules('rate_professionalism', '* Rate professionalism', 'trim|xss_clean|numeric|greater_than_equal_to[1]|less_than_equal_to[5]');
            $this->form_validation->set_rules('rate_facility', '* Rate facility', 'trim|xss_clean|numeric|greater_than_equal_to[1]|less_than_equal_to[5]');
            $this->form_validation->set_rules('rate_project_focus', '* Rate project focus', 'trim|xss_clean|numeric|greater_than_equal_to[1]|less_than_equal_to[5]');
            $this->form_validation->set_rules('rate_safety_aspect', '* Rate safety aspect', 'trim|xss_clean|numeric|greater_than_equal_to[1]|less_than_equal_to[5]');
            $this->form_validation->set_rules('rate_competitiveness', '* Rate competitiveness', 'trim|xss_clean|numeric|greater_than_equal_to[1]|less_than_equal_to[5]');
            $this->form_validation->set_error_delimiters('<i class="error text-danger" style="font-size:11px">', '</i>');

            if ($this->form_validation->run()) {
                $save_data['name_portfolio'] = $this->input->post('name_portfolio', true);
                $save_data['desc_portfolio'] = $this->input->post('desc_portfolio', true);
                $save_data['image'] = $this->imageCopy($this->input->post('image', true), $_POST['file-dir-image']);
                $save_data['client_name'] = $this->input->post('client_name', true);
                $save_data['category'] = $this->input->post('category', true);
                $save_data['project_date'] = date('Y-m-d', strtotime($this->input->post('project_date', true)));
                $save_data['pic'] = $this->input->post('pic', true);
                $save_data['jabatan'] = $this->input->post('jabatan', true);
                $save_data['rate_quality'] = $this->input->post('rate_quality', true);
                $save_data['rate_awareness'] = $this->input->post('rate_awareness', true);
                $save_data['rate_service'] = $this->input->post('rate_service', true);
                $save_data['rate_professionalism'] = $this->input->post('rate_professionalism', true);
                $save_data['rate_facility'] = $this->input->post('rate_facility', true);
                $save_data['rate_project_focus'] = $this->input->post('rate_project_focus', true);
                $save_data['rate_safety_aspect'] = $this->input->post('rate_safety_aspect', true);
                $save_data['rate_competitiveness'] = $this->input->post('rate_competitiveness', true);

                $this->model->insert($save_data);

                set_message('success', cclang('notif_save'));
                $json['redirect'] = url('portfolio');
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
        $this->is_allowed('portfolio_update');
        if ($row = $this->model->find(dec_url($id))) {
            $this->template->set_title(cclang('update') . ' ' . $this->title);
            $data = [
                'action' => url("portfolio/update_action/$id"),
                'name_portfolio' => set_value('name_portfolio', $row->name_portfolio),
                'desc_portfolio' => set_value('desc_portfolio', $row->desc_portfolio),
                'image' => set_value('image', $row->image),
                'client_name' => set_value('client_name', $row->client_name),
                'category' => set_value('category', $row->category),
                'project_date' => $row->project_date == '' ? '' : date('Y-m-d', strtotime($row->project_date)),
                'pic' => set_value('pic', $row->pic),
                'jabatan' => set_value('jabatan', $row->jabatan),
                'rate_quality' => set_value('rate_quality', $row->rate_quality),
                'rate_awareness' => set_value('rate_awareness', $row->rate_awareness),
                'rate_service' => set_value('rate_service', $row->rate_service),
                'rate_professionalism' => set_value('rate_professionalism', $row->rate_professionalism),
                'rate_facility' => set_value('rate_facility', $row->rate_facility),
                'rate_project_focus' => set_value('rate_project_focus', $row->rate_project_focus),
                'rate_safety_aspect' => set_value('rate_safety_aspect', $row->rate_safety_aspect),
                'rate_competitiveness' => set_value('rate_competitiveness', $row->rate_competitiveness),
                'pimpinan' => $this->db
                    ->select(['nama', 'jabatan'])
                    ->get('pimpinan')
                    ->result_array(),
            ];
            $this->template->view('update', $data);
        } else {
            $this->error404();
        }
    }

    function update_action($id)
    {
        if ($this->input->is_ajax_request()) {
            if (!is_allowed('portfolio_update')) {
                show_error('Access Permission', 403, '403::Access Not Permission');
                exit();
            }

            $json = ['success' => false];
            $this->form_validation->set_rules('name_portfolio', '* Name portfolio', 'trim|xss_clean|required');
            $this->form_validation->set_rules('desc_portfolio', '* Desc portfolio', 'trim|xss_clean|required');
            $this->form_validation->set_rules('image', '* Image', 'trim|xss_clean|required');
            $this->form_validation->set_rules('client_name', '* Client name', 'trim|xss_clean|required');
            $this->form_validation->set_rules('category', '* Category', 'trim|xss_clean|required');
            $this->form_validation->set_rules('project_date', '* Project date', 'trim|xss_clean|required');
            $this->form_validation->set_rules('pic', '* Pic', 'trim|xss_clean|required');
            $this->form_validation->set_rules('jabatan', '* Jabatan', 'trim|xss_clean|required');
            $this->form_validation->set_rules('rate_quality', '* Rate quality', 'trim|xss_clean|numeric|greater_than_equal_to[1]|less_than_equal_to[5]');
            $this->form_validation->set_rules('rate_awareness', '* Rate awareness', 'trim|xss_clean|numeric|greater_than_equal_to[1]|less_than_equal_to[5]');
            $this->form_validation->set_rules('rate_service', '* Rate service', 'trim|xss_clean|numeric|greater_than_equal_to[1]|less_than_equal_to[5]');
            $this->form_validation->set_rules('rate_professionalism', '* Rate professionalism', 'trim|xss_clean|numeric|greater_than_equal_to[1]|less_than_equal_to[5]');
            $this->form_validation->set_rules('rate_facility', '* Rate facility', 'trim|xss_clean|numeric|greater_than_equal_to[1]|less_than_equal_to[5]');
            $this->form_validation->set_rules('rate_project_focus', '* Rate project focus', 'trim|xss_clean|numeric|greater_than_equal_to[1]|less_than_equal_to[5]');
            $this->form_validation->set_rules('rate_safety_aspect', '* Rate safety aspect', 'trim|xss_clean|numeric|greater_than_equal_to[1]|less_than_equal_to[5]');
            $this->form_validation->set_rules('rate_competitiveness', '* Rate competitiveness', 'trim|xss_clean|numeric|greater_than_equal_to[1]|less_than_equal_to[5]');
            $this->form_validation->set_error_delimiters('<i class="error text-danger" style="font-size:11px">', '</i>');

            if ($this->form_validation->run()) {
                $save_data['name_portfolio'] = $this->input->post('name_portfolio', true);
                $save_data['desc_portfolio'] = $this->input->post('desc_portfolio', true);
                $save_data['image'] = $this->imageCopy($this->input->post('image', true), $_POST['file-dir-image']);
                $save_data['client_name'] = $this->input->post('client_name', true);
                $save_data['category'] = $this->input->post('category', true);
                $save_data['project_date'] = date('Y-m-d', strtotime($this->input->post('project_date', true)));
                $save_data['pic'] = $this->input->post('pic', true);
                $save_data['jabatan'] = $this->input->post('jabatan', true);
                $save_data['rate_quality'] = $this->input->post('rate_quality', true);
                $save_data['rate_awareness'] = $this->input->post('rate_awareness', true);
                $save_data['rate_service'] = $this->input->post('rate_service', true);
                $save_data['rate_professionalism'] = $this->input->post('rate_professionalism', true);
                $save_data['rate_facility'] = $this->input->post('rate_facility', true);
                $save_data['rate_project_focus'] = $this->input->post('rate_project_focus', true);
                $save_data['rate_safety_aspect'] = $this->input->post('rate_safety_aspect', true);
                $save_data['rate_competitiveness'] = $this->input->post('rate_competitiveness', true);

                $save = $this->model->change(dec_url($id), $save_data);

                set_message('success', cclang('notif_update'));

                $json['redirect'] = url('portfolio');
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
            if (!is_allowed('portfolio_delete')) {
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

/* End of file Portfolio.php */
/* Location: ./application/modules/portfolio/controllers/backend/Portfolio.php */
