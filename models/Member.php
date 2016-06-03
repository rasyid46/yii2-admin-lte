<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "member".
 *
 * @property integer $member_id
 * @property string $username
 * @property string $password
 * @property string $nama_lkp
 * @property string $tgl_lahir
 * @property string $email
 * @property string $jenis_kelamin
 * @property string $alamat
 * @property string $no_telpon
 * @property string $foto
 *
 * @property Penjualan[] $penjualans
 */
class Member extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'member';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password', 'nama_lkp', 'tgl_lahir', 'email', 'jenis_kelamin', 'alamat', 'no_telpon', 'foto'], 'required'],
            [['alamat', 'foto'], 'string'],
            [['username'], 'string', 'max' => 50],
            [['password', 'nama_lkp', 'tgl_lahir', 'email'], 'string', 'max' => 100],
            [['jenis_kelamin'], 'string', 'max' => 10],
            [['no_telpon'], 'string', 'max' => 12],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'member_id' => 'Member ID',
            'username' => 'Username',
            'password' => 'Password',
            'nama_lkp' => 'Nama Lkp',
            'tgl_lahir' => 'Tgl Lahir',
            'email' => 'Email',
            'jenis_kelamin' => 'Jenis Kelamin',
            'alamat' => 'Alamat',
            'no_telpon' => 'No Telpon',
            'foto' => 'Foto',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPenjualans()
    {
        return $this->hasMany(Penjualan::className(), ['member_id' => 'member_id']);
    }
}
