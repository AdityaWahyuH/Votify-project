public function suara()
{
    return $this->hasMany(Suara::class, 'id_calon');
}
