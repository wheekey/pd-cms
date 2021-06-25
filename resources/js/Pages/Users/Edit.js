import React from 'react';
import Helmet from 'react-helmet';
import { Inertia } from '@inertiajs/inertia';
import { InertiaLink, usePage, useForm } from '@inertiajs/inertia-react';
import Layout from '../../Shared/Layout';
import DeleteButton from '../../Shared/DeleteButton';
import LoadingButton from '../../Shared/LoadingButton';
import TextInput from '../../Shared/TextInput';
import SelectInput from '../../Shared/SelectInput';
import TrashedMessage from '../../Shared/TrashedMessage';

const Edit = () => {
  const { user } = usePage().props;
  const { data, setData, errors, post, processing } = useForm({
    name: user.name || '',
    email: user.email || '',
    password: user.password || '',
    owner: user.owner ? '1' : '0' || '0',

    // NOTE: When working with Laravel PUT/PATCH requests and FormData
    // you SHOULD send POST request and fake the PUT request like this.
    _method: 'PUT'
  });

  function handleSubmit(e) {
    e.preventDefault();

    // NOTE: We are using POST method here, not PUT/PACH. See comment above.
    post(route('users.update', user.id));
  }

  function destroy() {
    if (confirm('Are you sure you want to delete this user?')) {
      Inertia.delete(route('users.destroy', user.id));
    }
  }

  function restore() {
    if (confirm('Are you sure you want to restore this user?')) {
      Inertia.put(route('users.restore', user.id));
    }
  }

  return (
    <div>
      <Helmet title={`${data.name} `} />
      <div className="flex justify-start max-w-lg mb-8">
        <h1 className="text-3xl font-bold">
          <InertiaLink
            href={route('users')}
            className="text-indigo-600 hover:text-indigo-700"
          >
            Users
          </InertiaLink>
          <span className="mx-2 font-medium text-indigo-600">/</span>
          {data.name}
        </h1>
      </div>


      <div className="max-w-3xl overflow-hidden bg-white rounded shadow">
        <form onSubmit={handleSubmit}>
          <div className="flex flex-wrap p-8 -mb-8 -mr-6">
            <TextInput
              className="w-full pb-8 pr-6 lg:w-1/2"
              label="Name"
              name="name"
              errors={errors.name}
              value={data.name}
              onChange={e => setData('name', e.target.value)}
            />
            <TextInput
              className="w-full pb-8 pr-6 lg:w-1/2"
              label="Email"
              name="email"
              type="email"
              errors={errors.email}
              value={data.email}
              onChange={e => setData('email', e.target.value)}
            />
            <TextInput
              className="w-full pb-8 pr-6 lg:w-1/2"
              label="Password"
              name="password"
              type="password"
              errors={errors.password}
              value={data.password}
              onChange={e => setData('password', e.target.value)}
            />
            <SelectInput
              className="w-full pb-8 pr-6 lg:w-1/2"
              label="Owner"
              name="owner"
              errors={errors.owner}
              value={data.owner}
              onChange={e => setData('owner', e.target.value)}
            >
              <option value="1">Yes</option>
              <option value="0">No</option>
            </SelectInput>
          </div>
          <div className="flex items-center px-8 py-4 bg-gray-100 border-t border-gray-200">
            {!user.deleted_at && (
              <DeleteButton onDelete={destroy}>Delete User</DeleteButton>
            )}
            <LoadingButton
              loading={processing}
              type="submit"
              className="ml-auto btn-indigo"
            >
              Update User
            </LoadingButton>
          </div>
        </form>
      </div>
    </div>
  );
};

Edit.layout = page => <Layout children={page} />;

export default Edit;
