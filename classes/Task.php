<?php

class Task
{
    private $db;

    protected $model;

    /**
     * Task constructor.
     * @param null $model
     */
    public function __construct($model = null)
    {
        $this->db = new DB();

        if (!is_null($model)) {
            $this->model = $model;
        }
    }

    /**
     * @return array
     */
    public function all()
    {
        $results = [];

        $r = $this->db->query("SELECT * FROM tasks");

        while ($result = $r->fetch()) {
            $results[] = $this->buildModel($result);
        }

        return $results;
    }

    /**
     * @param $id
     * @return Task|null
     */
    public function find($id)
    {
        if ($result = $this->db->query("SELECT * FROM tasks WHERE id = ?", [$id])->fetch()) {
            return $this->buildModel($result);
        }

        return null;
    }

    /**
     * @param $params
     * @return Task|null
     */
    public function create($params)
    {
        $this->db->query("INSERT INTO tasks (`name`, `completed`, `created_at`) VALUES(?, ?, ?)", $params);

        if ($id = $this->db->lastInsertId()) {
            return $this->find($id);
        }

        return null;
    }

    /**
     * @return bool
     */
    public function toggle()
    {
        if (!is_null($this->id)) {
            $completed = (bool) $this->completed ? 0 : 1;

            $this->db->query("UPDATE tasks SET completed = {$completed} WHERE id = ?", [$this->id]);

            $this->model['completed'] = $completed;

            return true;
        }

        return false;
    }

    /**
     * @param $model
     * @return Task
     */
    private function buildModel($model)
    {
        return new static($model);
    }

    /**
     * @param $name
     * @return mixed|null
     */
    public function __get($name)
    {
        if (!is_null($this->model) && isset($this->model[$name])) {
            return $this->model[$name];
        }

        return null;
    }
}