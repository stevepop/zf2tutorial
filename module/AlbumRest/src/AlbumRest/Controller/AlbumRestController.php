<?php

    namespace AlbumRest\Controller;

    use Zend\Mvc\Controller\AbstractRestfulController;

    class AlbumRestController extends AbstractRestfulController
    {
        protected $albumTable;

        public function getList()
        {
            $results = $this->getAlbumTable()->fetchAll();
            $data = array();
            foreach($results as $result) {
                $data[] = $result;
            }

            return array('data' => $data);
        }

        public function get($id)
        {
            $album = $this->getAlbumTable()->getAlbum($id);
            return array("data" => $album);
        }

        public function create($data)
        {

        }

        public function update($id, $data)
        {

        }

        public function delete($id)
        {

        }

        public function getAlbumTable()
        {
            if(!$this->albumTable) {
                $sm = $this->getServiceLocator();
                $this->albumTable = $sm->get('Album\Model\AlbumTable');
            }
            return $this->albumTable;
        }

    }
