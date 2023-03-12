<?php

namespace Kuvalkin\Example\Controller;

use Bitrix\Main\Engine\Controller;
use Bitrix\Main\Error;
use Bitrix\Main\UserTable;

class User extends Controller
{
	private const VOWELS = ['a', 'e' ,'i' ,'o' ,'u'];

	public function getUserNameVowelsAction(int $id): ?array
	{
		$user =
			UserTable::query()
				->setSelect(['NAME', 'LAST_NAME', 'SECOND_NAME'])
				->where('ID', $id)
				->fetchObject()
		;
		if (!$user)
		{
			$this->addError(new Error('User not found', 'NOT_FOUND'));

			return null;
		}

		$letters = mb_str_split(mb_strtolower($user->getName() . $user->getLastName() . $user->getSecondName()));
		$foundVowels = [];
		foreach ($letters as $letter)
		{
			if (in_array($letter, self::VOWELS, true))
			{
				$foundVowels[] = $letter;
			}
		}

		return [
			'vowels' => implode('', $foundVowels),
		];
	}
}
