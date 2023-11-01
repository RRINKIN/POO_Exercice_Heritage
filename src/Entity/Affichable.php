<?php
// namespace
namespace Poo\HeritageComposer\Entity;

interface Affichable {
    public function afficheTableau(): array;
    public function afficheLigne(): string;
};
