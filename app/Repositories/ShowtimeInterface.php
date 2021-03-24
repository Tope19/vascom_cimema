<?php
namespace App\Repositories;

interface ShowtimeInterface{
    public function all();

    public function getCinema();

    public function getMovie();

    public function edit($id);

    public function store(array $data);

    public function update($id, array $data);

    public function delete($id);
}
