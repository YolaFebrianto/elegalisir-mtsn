<?php
	function flashdata_alert(){
		$CI = get_instance();
		$html = '';
		if($CI->session->flashdata('success') != ''){
			$html .= '<div>
					<div class="alert alert-success" role="alert">
						<button type="button" class="close" data-dismiss="alert">
							<span class="fa fa-close"></span>
						</button>'.$CI->session->flashdata('success').'
					</div>
				</div>';
		}
		if($CI->session->flashdata('error') != ''){
			$html .= '<div>
					<div class="alert alert-danger" role="alert">
						<button type="button" class="close" data-dismiss="alert">
							<span class="fa fa-close"></span>
						</button>'.$CI->session->flashdata('error').'
					</div>
				</div>';
		}
		return $html;
	}
	function limit_words($string, $word_limit){
		$words = explode(" ",$string);
		return implode(" ",array_splice($words,0,$word_limit));
	}
	function get_web_setting(){
		$CI = get_instance();
		$CI->load->model('M_setting');
		$data = $CI->M_setting->get()->row_array();
		return $data;
	}
	function get_admin_js(){
		$js = '<!-- jQuery 2.2.3 -->
		<script src="'.base_url().'assets/plugins/jQuery/jquery-2.2.3.min.js'.'"></script>
		<!-- DataTables -->
		<script src="'.base_url().'assets/plugins/datatables/jquery.dataTables.min.js'.'"></script>
		<script src="'.base_url().'assets/plugins/datatables/dataTables.bootstrap.min.js'.'"></script>
		<script>
		  $(function () {
		    $("#example1").DataTable();
		    $("#example2").DataTable({
		      "paging": true,
		      "lengthChange": false,
		      "searching": true,
		      "ordering": true,
		      "info": true,
		      "autoWidth": false
		    });
		  });
		</script>';
		echo $js;
	}
?>