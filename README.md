# API Documentation

## Introduction

REST API of educational institution to manage the entire system of students, teachers, courses and student attendance.

## Endpoints

### GET /api/teachers

#### Description

Returns all teachers registered in the database.

#### Parameters

No parameters needed.

#### Response

```json
[
    {
        "id": 1,
        "name": "Mr. Leland Waelchi",
        "created_at": "2023-10-17T21:58:25.000000Z",
        "updated_at": "2023-10-17T21:58:25.000000Z"
    }
]
```

### GET /api/teachers/:id

#### Description

Returns a teacher registered in the database by his id.

#### Parameters

-   `id`: teacher id.

#### Response

```json
{
    "id": 1,
    "name": "Mr. Leland Waelchi",
    "created_at": "2023-10-17T21:58:25.000000Z",
    "updated_at": "2023-10-17T21:58:25.000000Z"
}
```

### POST /api/teachers

#### Description

Returns a teacher registered in the database by his id.

#### Parameters

No parameters needed.

#### Resquest

```json
{
    "name": "Mr. Leland Waelchi",
}
```

#### Response

```json
{
    "name": "Mr. Leland Waelchi",
    "updated_at": "2023-10-18T17:21:21.000000Z",
    "created_at": "2023-10-18T17:21:21.000000Z",
    "id": 22
}
```
