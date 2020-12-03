<?php 
abstract class AbstractPageTemplate{
    protected final function template(){
        $result =$this->header();        
        $result.=$this->article();;
        $result.=$this->footer();
        return $result;
    }
    protected abstract function hedaer();
    protected abstract function article();
    protected abstract function footer();
    public function render()
    {        
        return $this ->template();
    }
}
class TextPage extends AbstractPageTemplate{
    protected function header(){
        return "PHP<br>";
    }
    protected function article(){
        return "php:hyperText preprocesssor<br>";
    }
    protected function footer(){
        return "website";
    }
} 
class HtmlPage extends AbstractPageTemplate{
    protected function header(){
        return "<header>PHP</header><br>";
    }
    protected function article(){
        return "<article>php:hyperText preprocesssor</article><br>";
    }
    protected function footer(){
        return "<footer>website</footer>";
    }

    public function render()
    {
        $result='<html>';
        $result.=$this->template();
        return $result.'</html>';
    }
}
    echo '<h1>text</h1>';
    $text = new TextPage();
    echo $text->render();

    echo '<h1>html</h1>';
    $html= new HtmlPage();
    echo $html->render();
?>