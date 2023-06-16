<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\Note;
use Authorization\IdentityInterface;

/**
 * User policy
 */
class NotePolicy
{
    /**
     * Check if $note can create Note
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\Note $note
     * @return bool
     */
    public function canCreate(IdentityInterface $user, Note $note)
    {
        return $user->email === 'danipato14112001@gmail.com';
    }

    /**
     * Check if $note can update Note
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\Note $note
     * @return bool
     */
    public function canUpdate(IdentityInterface $user, Note $note)
    {
        return $user->email === 'danipato14112001@gmail.com';
    }

    /**
     * Check if $user can delete Note
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\User $note
     * @return bool
     */
    public function canDelete(IdentityInterface $user, Note $note)
    {
        return $user->email === 'danipato14112001@gmail.com';
    }

    /**
     * Check if $user can view User
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\Note $note
     * @return bool
     */
    public function canView(IdentityInterface $user, User $resource)
    {
        return true;
    }
}
