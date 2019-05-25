<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class CalendarioModel extends CI_MODEL
{

    /**
     *cogemos los datos de la tabla calendario y la colocamos en cada día añadiendo una clase
     *del calendario
     * @access public
     * @param $month - int número de mes
     * @param $year - int número de año
     * @return array - información del estado de cada día del mes para pintar el calendario
     */
    function get_calendar_data($year, $month) {

        $query = $this->db->select('*')->from('calendario')->like('fecha', "$year-$month", 'after')->get();
        $cal_data = array();

        foreach ($query->result() as $row) {

            $index = ltrim(substr($row->fecha, 8, 2), '0');
            $cal_data[$index] = $row->estado;

        }
        return $cal_data;

    }

     /**
     *hacemos que el usuario pueda coger hora a través del calendario con varios intervalos de horas
     * @access public
     * @param $dia_calendario - string fecha pulsada en el calendario formato 2013/09/01
     * @param $month - string número de mes
     * @param $year - int número de año
     * @return html - calendario con la información de la base de datos
     */
    public function generar_calendario($year, $month) {

        $conf_calendar = array('show_next_prev' => TRUE, 
							   'next_prev_url' => base_url('index.php/Calendario/cal'), 
							   'start_day' => 'lunes',
							   'day_type' => 'short',
							   'template' => '  
                                      
               {table_open}<table border="0" cellpadding="0" cellspacing="0" class="calendario">{/table_open}

               {heading_row_start}<tr id="head_links">{/heading_row_start}
            
               {heading_previous_cell}<th class="previo"><a href="{previous_url}"><</a></th>{/heading_previous_cell}
               {heading_title_cell}<th class="fecha_actual" colspan="{colspan}">{heading}</th>{/heading_title_cell}
               {heading_next_cell}<th class="siguiente"><a href="{next_url}">></a></th>{/heading_next_cell} 
            
               {heading_row_end}</tr>{/heading_row_end}
               
               {week_row_start}<tr>{/week_row_start}
               {week_day_cell}<td class="dias_semana">{week_day}</td>{/week_day_cell}
               {week_row_end}</tr>{/week_row_end}
               
               {cal_row_start}<tr>{/cal_row_start}
               {cal_cell_start}<td class="dia">{/cal_cell_start}   
            
               {cal_cell_content}<div id=oc_{content} class="otro_dia {content}">{day}</div>{/cal_cell_content}
               {cal_cell_content_today}<div class="highlight">{day}</div>{/cal_cell_content_today}
                   
               {cal_cell_no_content}<div class="highlight">{day}</div>{/cal_cell_no_content}
               {cal_cell_no_content_today}<div class="highlight">{day}</div>{/cal_cell_no_content_today}
                   
               {cal_cell_blank}<br><br>{/cal_cell_blank}
                   
               {cal_cell_end}</td>{/cal_cell_end}
               {cal_row_end}</tr>{/cal_row_end}
            
               {table_close}</table>{/table_close}             
        ');

        $this->load->library('calendar', $conf_calendar);

        $calendar_data = $this->get_calendar_data($year, $month);

        return $this->calendar->generate($year, $month, $calendar_data);

    }

  
     /**
     * @access public
     * @param $month - int número de mes
     * @param $year - int número de año
     * @return array - total días del mes
     */
    public function get_total_days($month, $year) 
    {
        //array con los días de cada mes del año
        $days_in_month = array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);

        //si no es un mes salimos de la función
        if ($month < 1 OR $month > 12) 
        {
            return;
        }

        //Si es febrero y es año bisiesto tiene 29 días
        if ($month == 2) 
        {
            if ($year % 400 == 0 OR ($year % 4 == 0 AND $year % 100 != 0)) 
            {
                return 29;
            }
        }
        //devolvemos un array con los días del mes
        return $days_in_month[$month - 1];
    }

    /**
     *al situarnos en un mes comprobamos si existen los datos de ese mes en la base de datos
     *si no existen los introducimos, en otro caso no hacemos nada
     * @access public
     * @param $month - int número de mes
     * @param $year - int número de año
     */
    public function insert_calendario($month, $year) 
    {

        $dias_total_mes = $this -> get_total_days($month, $year);

        $this->db->like('fecha', "$year-$month", 'after');
        $query = $this->db->get('calendario');
        if ($query -> num_rows() == 0) 
        {
            for ($i = 1; $i <= $dias_total_mes; $i++) 
            {
                //obtenemos cada uno de los días del mes
                $weekDay = date('w', strtotime(date($year . "-" . $month . "-" . $i)));
                //comprobamos si es saábado o domingo
                if ($weekDay == 0 || $weekDay == 6) 
                {

                    $data[$i] = array('fecha' => $year . "-" . $month . "-" . $i, 'comentario' => '', 'estado' => 'fest');

                } 
                //comprobamos si es una fecha anterior a la actual
                else if ($month == date('m') && $i < date('d')) 
                {

                    $data[$i] = array('fecha' => $year . "-" . $month . "-" . $i, 'comentario' => '', 'estado' => 'ant');

                } 
                //días posteriores al día actual
                else 
                {

                    $data[$i] = array('fecha' => $year . "-" . $month . "-" . $i, 'comentario' => '', 'estado' => '');

                }

                //insertamos los días del mes en la base de datos
                $this->db->insert('calendario', $data[$i]);

            }
        }
    }

    /**
     *al pulsar en cualquier fecha del calendario comprobamos si existe en la tabla citas
     *si no existe creamos las horas para esa fecha en la tabla citas
     * @access public
     * @param $day - int número de dia
     * @param $month - int número de mes
     * @param $year - int número de año
     */
    public function insert_horas($year, $month, $day) 
    {
        $this->db->where('fecha', $year . "-" . $month . "-" . $day);
        $get_calendar = $this->db->get('calendario');

        $this->db->where('dia_calendario', $year . "-" . $month . "-" . $day);
        $query = $this->db->get('citas');
        if ($query->num_rows() < 10) {
            //i es desde la hora que queremos empezar a dar horas y 21 una hora antes
            //este ejemplo es de las 10 de la mañana a las 8 de la tarde, modificalo a tus necesidades
            for ($i = 8; $i < 23; $i++) 
            {

                $data[$i] = array(
                    'dia_calendario' => $year . "-" . $month . "-" . $day, 'hora_cita' => $i . ':00:00', 
                    'comentario_cita' => '', 
                    'estado' => 'libre'
                );

                $this->db->insert('citas', $data[$i]);
            }
        }
    }

    /**
     *comprobamos si hay horas disponibles para ese día en concreto
     * @access public
     * @param $day - int número de dia
     * @param $month - int número de mes
     * @param $year - int número de año
     */
    public function horas_seleccionadas($year, $month, $day) 
    {

        $this->db->where('dia_calendario', $year . "-" . $month . "-" . $day);

        $this->db->order_by('hora_cita');

        $query = $this->db->get('citas');

        //si hay horas disponibles las devolvemos
        if ($query -> num_rows() > 0) 
        {

            return $query->result();

        }else{

            return false;

        }
    }

    /**
     *hacemos que el usuario pueda coger hora a través del calendario con varios intervalos de horas
     * @access public
     * @param $dia_calendario - string fecha pulsada en el calendario formato 2013/09/01
     * @param $month - string número de mes
     * @param $year - int número de año
     */
    public function nueva_cita($dia_calendario, $hora, $comentario_cita, $estado) 
    {

        $data = array("estado" => "ocupado","comentario_cita" => $comentario_cita);
        $this->db->where("hora_cita", $hora);
        $this->db->where("dia_calendario", $dia_calendario);
        $query = $this->db->update("citas",$data);

        if ($query) {

            //si se crea la nueva cita, sumamos uno al campo num_citas de la tabla calendario
            $this->db->where('fecha', $dia_calendario);
            $data_cal = $this->db->get('calendario');
            $row_cal = $data_cal->row();

            $date_update = $row_cal->estado;
            $date_update += 1;

            $new_data_cal = array('estado' => $date_update);

            $this->db->where('fecha', $dia_calendario);
            return $this->db->update('calendario', $new_data_cal);

        }
    }

}
//end calendario_model