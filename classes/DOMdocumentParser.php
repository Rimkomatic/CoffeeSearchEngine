<?php
    class DOMdocumentParser{

        private $doc;

        public function __construct($url)
        {
            $options=array(
                'http'=>array('method'=>"GET" , 'header'=>"User-Agent: coffeeBot/0.1\n")
            );

            $context=stream_context_create($options);

            $this->doc=new DomDocument();
            // @$this->doc->loadHTML(file_get_contents($url,false,$context));
            @$this->doc->loadHTML('<?xml encoding="UTF-8">'.file_get_contents($url,false,$context));
        }
        
        public function getlinks()
        {
            return $this->doc->getElementsByTagName("a");
        }
       
        public function gettitle()
        {
            return $this->doc->getElementsByTagName("title");
        }
        public function getmeta()
        {
            return $this->doc->getElementsByTagName("meta");
        }
        public function getimages()
        {
            return $this->doc->getElementsByTagName("img");
        }
    }

?>