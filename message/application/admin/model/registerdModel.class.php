<?php
/**
 * admin模型类
 */
class registerdModel extends model{
    /**
     * 验证登录
     */
    public function checkByLogin(){
        //过滤输入数据
        $this->filter(array('username','password'),'trim');
        //接收输入数据
        $username = $_POST['username'];
        $password = $_POST['password'];
        //通过用户名查询密码信息
        $sql = 'select `password`,`salt` from `admin` where `username`=:username';
        $data = $this->db->fetchRow($sql,array(':username'=>$username));
        //判断用户名和密码
        if(!$data){
            //用户名不存在
            return false;
        }
        //返回密码比较结果
        return md5($password.$data['salt']) == $data['password'];
    }
    public function saveUser(){

        //接收输入数据
        $data['username'] = $_POST['username'];
        $data['password'] = $_POST['password'];
        $username = "'".$_POST['username']."'";
        $password = "'".$_POST['password']."iTca'";
        //拼接sql语句
        $sql = "insert into `admin` values (null, $username, MD5($password),'iTca')";
//        insert into `admin` values (null, '金彬彬', MD5('201722450813iTca'),'iTca');
//        foreach($data as $k=>$v){
//            echo $sql .= "`$k`=:$k,";
//        }
//        $sql = rtrim($sql,',');//去掉最右边的逗号
        //通过预处理执行SQL
        $flag = $this->db->query($sql);
        //返回是否执行成功
        return $flag;


    }
}
