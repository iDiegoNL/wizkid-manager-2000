<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Wizkid
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string|null $phone_number
 * @property string|null $profile_photo_path
 * @property \App\Enums\WizkidRole $role
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $fired_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\WizkidFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Wizkid newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Wizkid newQuery()
 * @method static \Illuminate\Database\Query\Builder|Wizkid onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Wizkid query()
 * @method static \Illuminate\Database\Eloquent\Builder|Wizkid whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wizkid whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wizkid whereFiredAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wizkid whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wizkid whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wizkid wherePhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wizkid whereProfilePhotoPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wizkid whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wizkid whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wizkid whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Wizkid withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Wizkid withoutTrashed()
 */
	class Wizkid extends \Eloquent {}
}

