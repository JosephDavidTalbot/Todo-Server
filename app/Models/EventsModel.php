<?php namespace App\Models;

use CodeIgniter\Model;

class EventsModel extends Model{
    protected $table = 'events';
    protected $primaryKey = 'event_id';
    protected $allowedFields = ['event_user', 'event_title', 'event_body', 'event_date', 'event_created_at'];

    public function getEvents($id){
        $db = \Config\Database::connect();
        $query = $db->table('events');
        $events = $query->getWhere(['event_user' => $id]);
        return $events->getResult('array');
        //return $this->asArray()->where(['event_user' => $id]);
    }
}
