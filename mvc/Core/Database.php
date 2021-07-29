<?php 
	/**
	 * 
	 */
	class Database
	{
		protected $connect = null;
		protected $host = "MYSQL5045.site4now.net";
		protected $user = "a77f49_mynghe";
		protected $pass = "theanhtd189";
		protected $name = "db_a77f49_mynghe";
		protected $table ="";
		protected $limit = 15;
		protected $offset = 0;
		function __construct()
		{
			$this->connect();		
		}

		public function connect()
		{
			# code...

			$this->connect = new mysqli($this->host,$this->user,$this->pass,$this->name);
			if ( $this->connect->connect_errno) {
				echo "Lỗi không thể kết nối database";
			  	die();
			  	exit($this->connect->connect_errno);
			}
		}
		
		public function table($table)
		{
			# code...
			$this->table = $table;
			return $this;
		}

		public function limit($limit)
		{
			# code...
			$this->limit = $limit;
			return $this;
		}
		public function offset($offset)
		{
			# code...
			$this->offset = $offset;
			return $this;
		}


		public function get()
		{
			# code...
			$sql = "SELECT * FROM  $this->table ORDER BY NgayTao DESC limit ? offset ?";

			$stmt = $this->connect->prepare($sql);

			$stmt->bind_param( "ii", $this->limit , $this->offset);
			
			$stmt->execute();

			$result = $stmt->get_result();
			$data = [];
			if($result->num_rows > 0){
				while ($obj = $result -> fetch_array()) {
				    array_push($data, $obj);
				}
			}
			return $data;
		}


		public function get_firts($key , $value)
		{
			$sql = "SELECT  * FROM $this->table WHERE $key = '$value'";
			$stmt = $this->connect->prepare($sql);
			$stmt->execute();
			$result = $stmt->get_result();
			$data = [];
			if ($result->num_rows > 0) {
			  // output data of each row
			   
			   	$data = $result->fetch_assoc();
			  }
			
			return $data;
			# code...
		}

		// insert trả về dữ liệu vừa insert
		public function LastInsertId($data=[])
		{
			
				$param = implode(",", array_keys($data)); //(firstname, lastname, email)

				$arr_value = implode(",", array_fill(0, count($data), "?")); //(?,?,?);

				$value = array_values($data);

				$stmt = $this->connect->prepare("INSERT INTO $this->table ($param) VALUES ($arr_value)");

				$stmt->bind_param( str_repeat("s", count($data)) , ...$value);

				$stmt->execute();
			    //Thực hiện đoạn mã này có khả năng ném ra một ngoại lệ

			    return $this->connect->insert_id;
			
			
			//"INSERT INTO MyGuests (firstname, lastname, email) VALUES (?, ?, ?)");
		}

		public function insert($data=[])
		{
			try {
				$param = implode(",", array_keys($data)); //(firstname, lastname, email)

				$arr_value = implode(",", array_fill(0, count($data), "?")); //(?,?,?);

				$value = array_values($data);

				$stmt = $this->connect->prepare("INSERT INTO $this->table ($param) VALUES ($arr_value)");

				$stmt->bind_param( str_repeat("s", count($data)) , ...$value);

				$stmt->execute();
			    //Thực hiện đoạn mã này có khả năng ném ra một ngoại lệ
			    return true;

			}
			catch (Exception $e) {
			    //Xử lý ngoại lệ ở đây
			    return false;

			}
			//"INSERT INTO MyGuests (firstname, lastname, email) VALUES (?, ?, ?)");
		}
		public function update($column , $value , $data = [])
		{
			# code...
			try {
				//"Update table set firstname=? , lastname = ?, email = ? VALUES id = ?;
				$arr_name_column_update = [];
				foreach ($data as $key => $val) {
					array_push($arr_name_column_update, $key."=?");
				}
				
				$str_param = implode(",", $arr_name_column_update);

				$data[$column]=$value;

				$arr_value = array_values($data);

				$stmt = $this->connect->prepare("UPDATE $this->table set $str_param where $column = ?");

				$stmt->bind_param( str_repeat("s", count($data)) , ...$arr_value);

				$stmt->execute();

				return true;
			    //Thực hiện đoạn mã này có khả năng ném ra một ngoại lệ
			}
			catch (Exception $e) {
			    //Xử lý ngoại lệ ở đây
			    return false;

			}

		}
		
		
		public function count_data()
		{
			# code..
			$this->connect->query("SELECT * FROM $this->table");
			
			return $this->connect->affected_rows;
		}

		public function get_all()
		{
			# code...
			$sql = "SELECT * FROM $this->table";
			$stmt = $this->connect->prepare($sql);
			$stmt->execute();
			$result = $stmt->get_result();
			$data = [];
			 while ($obj = $result -> fetch_array()) {
			    array_push($data, $obj);
			  }
			return $data;
		}
		public function truyvan($sql)
		{
			$stmt = $this->connect->prepare($sql);
			$stmt->execute();
			$result = $stmt->get_result();
			$data = [];
			if ($result->num_rows > 0){
                while ($obj = $result -> fetch_assoc()) {
                    array_push($data, $obj);
                }
            }

			return $data;
			# code...
		}

		public function del_category($key , $value)
		{
			# code...
			$sql = "DELETE FROM $this->table WHERE $key = '$value'";
			try{
				$stmt = $this->connect->prepare($sql);
				$stmt->execute();
				return true;
			}
			catch (Exception $e) {
			    //Xử lý ngoại lệ ở đây
			    return false;

			}
		}


		public function truy_van_first_content($sql)
		{
			# code...
			$stmt = $this->connect->prepare($sql);
			$stmt->execute();
			$result = $stmt->get_result();
			$data = [];
			if ($result->num_rows > 0) {
			  // output data of each row
			   
			   	$data = $result->fetch_assoc();
			  }
			
			return $data;
		}
		
		
	}
 ?>