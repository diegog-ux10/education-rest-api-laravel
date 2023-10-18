# API Documentation

## Introduction

REST API of educational institution to manage the entire system of students, teachers, courses and student attendance.

## Teachers Endpoints

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

Create a new teacher.

#### Parameters

No parameters needed.

#### Resquest

```json
{
    "name": "Mr. Leland Waelchi"
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

### PUT /api/teachers/:id

#### Description

Update a teacher by id.

#### Parameters

-   `id`: teacher id.

#### Resquest

```json
{
    "name": "Mr. Leland Waelchi"
}
```

#### Response

```json
{
    "id": 2,
    "name": "Mr. Leland Waelchi",
    "created_at": "2023-10-17T21:58:25.000000Z",
    "updated_at": "2023-10-18T17:23:58.000000Z"
}
```

### DELETE /api/teachers/:id

#### Description

Delete a teacher by id.

#### Parameters

-   `id`: teacher id.

## Students Endpoints

### GET /api/students

#### Description

Returns all students registered in the database.

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

### GET /api/students/:id

#### Description

Returns a student registered in the database by his id.

#### Parameters

-   `id`: student id.

#### Response

```json
{
    "id": 1,
    "name": "Mr. Leland Waelchi",
    "created_at": "2023-10-17T21:58:25.000000Z",
    "updated_at": "2023-10-17T21:58:25.000000Z"
}
```

### POST /api/students

#### Description

Create a new student.

#### Parameters

No parameters needed.

#### Resquest

```json
{
    "name": "Mr. Leland Waelchi"
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

### PUT /api/students/:id

#### Description

Update a student by id.

#### Parameters

-   `id`: student id.

#### Resquest

```json
{
    "name": "Mr. Leland Waelchi"
}
```

#### Response

```json
{
    "id": 2,
    "name": "Mr. Leland Waelchi",
    "created_at": "2023-10-17T21:58:25.000000Z",
    "updated_at": "2023-10-18T17:23:58.000000Z"
}
```

### DELETE /api/students/:id

#### Description

Delete a student by id.

#### Parameters

-   `id`: student id.

## Courses Endpoints

### GET /api/courses

#### Description

Returns all courses registered in the database.

#### Parameters

No parameters needed.

#### Response

```json
[
    {
        "id": 1,
        "name": "aperiam",
        "teacher_id": 2,
        "created_at": "2023-10-17T22:26:20.000000Z",
        "updated_at": "2023-10-17T22:26:20.000000Z",
        "teacher": {
            "id": 2,
            "name": "nombre actualizado 2",
            "created_at": "2023-10-17T21:58:25.000000Z",
            "updated_at": "2023-10-18T17:23:58.000000Z"
        }
    }
]
```

### GET /api/courses/:id

#### Description

Returns a course registered in the database by his id.

#### Parameters

-   `id`: course id.

#### Response

```json
{
    "id": 1,
    "name": "aperiam",
    "teacher_id": 2,
    "created_at": "2023-10-17T22:26:20.000000Z",
    "updated_at": "2023-10-17T22:26:20.000000Z",
    "teacher": {
        "id": 2,
        "name": "nombre actualizado 2",
        "created_at": "2023-10-17T21:58:25.000000Z",
        "updated_at": "2023-10-18T17:23:58.000000Z"
    }
}
```

### POST /api/courses

#### Description

Create a new course.

#### Parameters

No parameters needed.

#### Resquest

```json
{
    "name":"New Course name",
    "teacher_id": 5
}
```

#### Response

```json
{
    "name": "New Course name",
    "teacher_id": 5,
    "updated_at": "2023-10-18T17:30:16.000000Z",
    "created_at": "2023-10-18T17:30:16.000000Z",
    "id": 13
}
```

### PUT /api/courses/:id

#### Description

Update a course by id.

#### Parameters

-   `id`: course id.

#### Resquest

```json
{
    "name":"New Course name updated",
    "teacher_id": 7
}
```

#### Response

```json
{
    "id": 2,
    "name": "New Course name updated",
    "teacher_id": 7,
    "created_at": "2023-10-17T22:26:20.000000Z",
    "updated_at": "2023-10-18T14:42:29.000000Z"
}
```

### DELETE /api/courses/:id

#### Description

Delete a course by id.

#### Parameters

-   `id`: course id.
