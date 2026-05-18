<?php

namespace App\Enums;
enum BookingStatus: string
{
    case PENDING = 'pending';
    case CONFIRMED = 'confirmed';
    case COMPLETED = 'completed';
    case CANCELLED = 'cancelled';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    public function label(): string
    {
        return match ($this) {
            self::PENDING => 'Ожидает',
            self::CONFIRMED => 'Подтверждено',
            self::COMPLETED => 'Завершено',
            self::CANCELLED => 'Отменено',
        };
    }

    public function cssClass(): string
    {
        return match ($this) {
            self::PENDING => 'status-pending',
            self::CONFIRMED => 'status-confirmed',
            self::COMPLETED => 'status-completed',
            self::CANCELLED => 'status-cancelled',
        };
    }
}
