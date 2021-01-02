<?php
/**
 * 管理员模块控制器类
 */
class registeredController {
    /**
     * 注册方法
     */
    public function registeredAction(){
        //判断是否有表单提交
        if(!empty($_POST)){
            $captcha = new captcha();
            //判断验证码是否正确
            if (!$captcha -> checkCode(strtolower($_POST['captcha']))){
                //验证失败
                echo '输入的验证码不正确。';
//                echo "<script>alert('输入的验证码不正确')</script>";
                $this->jump('p=admin&c=registered&a=registered');

            }
            //实例化admin模型
            $adminModel = new registerdModel();
            //调用验证方法
            if($adminModel->checkByLogin()){
                //登录成功
//                session_start();
//                $_SESSION['admin'] = 'yes';
                //跳转
                echo "alert('该用户已存在！');location.reload();";
                $this->jump('index.php?p=admin');
            }else{
                if ($adminModel->saveUser()){
                    //注册成功
                    echo '注册成功！';
                    echo "<script>alert('注册成功')</script>";
                    $this->jump('index.php?p=admin');
                }
            }
        }
        //载入视图文件
        require('./application/admin/view/admin_registerd.html');
    }
    /**
     * 退出方法
     */
    public function logoutAction(){
        $_SESSION = null;
        session_destroy();
        //跳转
        $this->jump('index.php?p=admin');
    }
    /**
     * 验证码
     */
    public function captchaAction(){
        $captcha = new captcha();
        $captcha->generate();
    }
    /**
     * 跳转方法
     */
    protected function jump($url){
        header("Location: $url");
        die;
    }
}
