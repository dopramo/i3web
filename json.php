<?PHP
$post_data = array(
  'device_count' => array(
    'result' => "1",
    'user_id' => "19",
    'error_code' => "hjhhy",
    'error' => "ghjdgj"
  )
);
header('Content-Type: application/json');
echo json_encode($post_data);