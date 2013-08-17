<?php

//use Illuminate\Auth\UserInterface;
//use Illuminate\Auth\Reminders\RemindableInterface;

class Poll extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'polls';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array(	'answer_1',	'answer_2',	
								'answer_3',	'answer_4',
								'count_1',	'count_2',
								'count_3',	'count_4',
								'question'	
							);

	protected $fillable = array('answer_1',	'answer_2',	
								'answer_3',	'answer_4',
								'count_1',	'count_2',
								'count_3',	'count_4',
								'question'	
							);

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

}