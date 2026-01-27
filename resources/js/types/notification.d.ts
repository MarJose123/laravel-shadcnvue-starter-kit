export type NotificationType =
    | "success"
    | "error"
    | "warning"
    | "info"
    | (string & {});

export interface Notification {
    type: NotificationType;
    icon: string;
    color: string;
    title?: string;
    message: string;
}
